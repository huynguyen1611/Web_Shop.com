<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Image;
use App\Models\ProductVariant;
use App\Models\ProductVariantAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    //**PRODUCT */
    public function add_product()
    {
        $parentCategories = Category::whereNull('parent_id')->get();
        $subCategories = Category::whereNotNull('parent_id')->get();
        $attributes = Attribute::all();
        $attributes = Attribute::with('values')->get();

        return view('backend.product.add_product', compact('parentCategories', 'subCategories', 'attributes'));
    }
    public function list_product()
    {
        return view('backend.product.list_product');
    }
    public function product_store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'parent_category' => 'required',
            'sub_categories' => 'nullable|array',
            'product_code' => 'required|string|max:50',
            'origin' => 'nullable|string|max:100',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề sản phẩm.',
            'description.required' => 'Vui lòng nhập mô tả sản phẩm.',
            'content.required' => 'Vui lòng nhập nội dung sản phẩm.',
            'parent_category.required' => 'Vui lòng chọn danh mục cha.',
            'product_code.required' => 'Vui lòng nhập mã sản phẩm.',
            'price.required' => 'Vui lòng nhập giá bán sản phẩm.',
            'price.numeric' => 'Giá bán phải là một số.',
            'price.min' => 'Giá bán không được nhỏ hơn 0.',
            'discount.numeric' => 'Số tiền tiết kiệm phải là số.',
            'thumbnail.required' => 'Vui lòng chọn ảnh đại diện.',
            'thumbnail.image' => 'Ảnh đại diện phải là tệp hình ảnh.',
            'thumbnail.mimes' => 'Ảnh đại diện phải thuộc định dạng jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Ảnh đại diện không được vượt quá 2MB.',
            'album_images.*.image' => 'Mỗi ảnh trong album phải là tệp hình ảnh.',
            'album_images.*.mimes' => 'Ảnh trong album phải thuộc định dạng jpeg, png, jpg, gif.',
            'album_images.*.max' => 'Mỗi ảnh trong album không được vượt quá 2MB.',
        ]);
        DB::beginTransaction();
        try {
            // 1. Lưu sản phẩm chính
            $product = Product::create([
                'category_id'       => $request->input('sub_categories')[0], // chỉ lấy 1 danh mục phụ
                'name'              => $request->input('name'),
                'short_description' => $request->input('short_description'),
                'content'           => $request->input('content'),
                'origin'            => $request->input('origin'),
                'main_sku'          => $request->input('product_code'),
                'price'             => $request->input('price'),
                'sale_price'        => $request->input('sale_price'),
                'discount_percent'  => $request->input('discount_percent'),
                'has_variants'      => $request->has('has_variants')
            ]);

            // 2. Tạo bản ghi ảnh đại diện, album sau khi sản phẩm đã lưu thành công
            // a. Ảnh đại diện
            if ($request->hasFile('thumbnail')) {
                $thumbPath = $request->file('thumbnail')->store('products', 'public');

                Image::create([
                    'product_id' => $product->id,
                    'file_path' => $thumbPath,
                    'is_thumbnail' => true
                ]);
            }

            // b. Album ảnh
            if ($request->hasFile('album_images')) {
                foreach ($request->file('album_images') as $img) {
                    $imgPath = $img->store('products', 'public');

                    Image::create([
                        'product_id' => $product->id,
                        'file_path' => $imgPath,
                        'is_thumbnail' => false
                    ]);
                }
            }

            // 3. Xử lý biến thể nếu có
            if ($product->has_variants && $request->filled('variants')) {
                foreach ($request->input('variants') as $variantData) {
                    $variant = ProductVariant::create([
                        'product_id' => $product->id,
                        'sku' => $variantData['sku'] ?? null,
                        'price' => $variantData['price'] ?? 0,
                        'stock_quantity' => $variantData['stock'] ?? 0,
                        'variant_image' => $variantData['image'] ?? null, // nếu bạn xử lý ảnh riêng thì dùng cách lưu ảnh ở đây
                    ]);

                    // Gắn thuộc tính cho biến thể
                    if (isset($variantData['attributes'])) {
                        foreach ($variantData['attributes'] as $attributeId => $valueId) {
                            ProductVariantAttribute::create([
                                'product_variant_id' => $variant->id,
                                'attribute_id' => $attributeId,
                                'attribute_value_id' => $valueId,
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('product_index')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Ghi log nếu cần
            Log::error('Lỗi khi thêm sản phẩm: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Đã có lỗi xảy ra: ' . $e->getMessage());
        }
    }

    //**CATEGORY*
    public function list_category()
    {
        $categories = Category::all();
        return view('backend.product.list_category', [
            'categories' => $categories,
        ]);
    }
    public function add_category()
    {
        // $categories = Category::whereNull('parent_id')->get();
        // return view('backend.product.add_category', compact('categories'));
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('backend.product.add_category', compact('categories'));
    }
    public function category_store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'name.unique' => 'Đã có danh mục này trong hệ thống. Vui lòng nhập lại',
            'parent_id.exists' => 'Danh mục cha không hợp lệ.',
        ]);

        // Tạo mới danh mục
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id, // null nếu là danh mục cha
        ]);

        // Redirect về trang danh sách (hoặc form) kèm thông báo
        return redirect()->route('list_category')->with('success', 'Thêm danh mục thành công!');
    }

    //**ATTRIBUTE(nhóm thuộc tính)
    public function list_attribute()
    {
        $attributes = Attribute::latest()->get();
        return view('backend.product.list_attribute', [
            'attributes' => $attributes,
        ]);
    }

    public function attribute_add()
    {
        return view('backend.product.add_atttribute');
    }
    public function attribute_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên thuộc tính',
            'name.string' => 'Tên thuộc tính phải là chuỗi ký tự',
            'name.max' => 'Tên thuộc tính không quá 255 ký tự',
        ]);
        Attribute::create([
            'name' => $request->name,
        ]);
        return redirect()->route('list_attribute')->with('success', 'Thêm nhóm thuộc tính thành công');
    }
    //Chỉnh sửa nhóm thuộc tính
    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('admin.attributes.edit', compact('attribute'));
    }
    public function update(Request $request, $id)
    {
        $attribute = Attribute::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100|unique:attributes,name,' . $id
        ], [
            'name.required' => 'Tên nhóm thuộc tính không được để trống.',
            'name.unique' => 'Tên nhóm này đã tồn tại.',
        ]);

        $attribute->update([
            'name' => $request->name
        ]);

        return redirect()->route('attributes.index')->with('success', 'Cập nhật nhóm thuộc tính thành công!');
    }
    // Xóa nhóm thuộc tính
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        return redirect()->route('attributes.index')->with('success', 'Xoá nhóm thuộc tính thành công!');
    }

    //** ATTRIBUTE_VALUE(thuộc tính) */

    public function attribute(Request $request)
    {
        $query = AttributeValue::with('attribute');

        if ($request->attribute_id && $request->attribute_id != 0) {
            $query->where('attribute_id', $request->attribute_id);
        }

        if ($request->keyword) {
            $query->where('value', 'LIKE', '%' . $request->keyword . '%');
        }

        $attribute_value = $query->latest()->get();
        $attributes = Attribute::all();

        return view('backend.product.attribute', compact('attribute_value', 'attributes'));
    }

    public function attribute_create()
    {
        $attributes = Attribute::all();
        return view('backend.product.create_attribute', [
            'attributes' => $attributes,
        ]);
    }
    public function insert_attribute(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:100|unique:attribute_values,value',
            'image' => 'nullable|image|max:2048',
        ], [
            'attribute_id.required' => 'Bạn phải chọn nhóm thuộc tính.',
            'value.required' => 'Giá trị thuộc tính không được để trống.',
            'value.unique' => 'Tên thuộc tính đã có!',
            'value.string' => 'Tên thuộc tính phải là chuổi kí tự',
            'image.image' => 'File tải lên phải là hình ảnh.',
        ]);


        DB::beginTransaction();
        try {
            // 1. Lưu thuộc tính không có ảnh trước
            $attribute = AttributeValue::create([
                'attribute_id' => $request->input('attribute_id'),
                'value' => $request->input('value'),
            ]);

            // 2. Nếu có ảnh thì chỉ upload sau khi DB thành công
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('attribute_images', 'public');

                $attribute->update([
                    'image' => $imagePath
                ]);
            }

            DB::commit();
            return redirect()->route('attribute')->with('success', 'Thêm giá trị thuộc tính thành công!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Không cần xóa ảnh vì chưa hề upload ảnh
            Log::error('Lỗi khi thêm thuộc tính: ' . $e->getMessage());

            return redirect()->route('attribute')->with('error', 'Lỗi khi thêm thuộc tính!');
        }
    }
}
