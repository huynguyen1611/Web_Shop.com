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
        $products = Product::all();
        return view('backend.product.list_product', [
            'products' => $products,
        ]);
    }
    public function product_store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'parent_category' => 'required',
            'sub_categories' => 'nullable|array',
            'product_code' => 'required|string|max:50',
            'origin' => 'nullable|string|max:100',
            'price' => 'required|string',
            'sale_price' => 'nullable|string',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'short_description.required' => 'Vui lòng nhập mô tả ngắn.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'parent_category.required' => 'Vui lòng chọn danh mục cha.',
            'product_code.required' => 'Vui lòng nhập mã sản phẩm.',
            'price.required' => 'Vui lòng nhập giá bán sản phẩm.',
            'thumbnail.required' => 'Vui lòng chọn ảnh đại diện.',
            'thumbnail.image' => 'Ảnh đại diện phải là hình ảnh hợp lệ.',
            'thumbnail.mimes' => 'Ảnh đại diện phải là jpeg, png, jpg, gif.',
            'thumbnail.max' => 'Ảnh đại diện không quá 2MB.',
            'album_images.*.image' => 'Mỗi ảnh trong album phải là hình ảnh.',
            'album_images.*.mimes' => 'Định dạng ảnh album không hợp lệ.',
            'album_images.*.max' => 'Mỗi ảnh trong album không quá 2MB.',
        ]);

        DB::beginTransaction();

        try {
            // 2. Chuẩn hóa giá tiền (loại dấu chấm nếu có)
            $price = (int) str_replace('.', '', $request->input('price'));
            $salePrice = (int) str_replace('.', '', $request->input('sale_price'));
            $discount = $request->input('discount_percent') ?? 0;

            // 3. Lấy danh mục con
            $subCategories = $request->input('sub_categories');
            $categoryId = is_array($subCategories) && count($subCategories) > 0 ? $subCategories[0] : null;

            if (!$categoryId) {
                return back()->withInput()->with('error', 'Vui lòng chọn ít nhất một danh mục phụ.');
            }

            // 4. Tạo sản phẩm
            $product = Product::create([
                'category_id'       => $categoryId,
                'name'              => $request->input('name'),
                'short_description' => $request->input('short_description'),
                'content'           => $request->input('content'),
                'origin'            => $request->input('origin'),
                'main_sku'          => $request->input('product_code'),
                'price'             => $price,
                'sale_price'        => $salePrice,
                'discount_percent'  => $discount,
                'has_variants'      => $request->has('has_variants')
            ]);

            // 5. Lưu ảnh đại diện
            if ($request->hasFile('thumbnail')) {
                $thumbPath = $request->file('thumbnail')->store('products', 'public');
                Image::create([
                    'product_id' => $product->id,
                    'file_path' => $thumbPath,
                    'is_thumbnail' => true
                ]);
            }

            // 6. Lưu album ảnh
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

            // 7. Lưu biến thể nếu có
            if ($product->has_variants && $request->filled('variants')) {
                foreach ($request->input('variants') as $index => $variantData) {
                    $imagePath = null;

                    // Xử lý ảnh riêng của biến thể (nếu có)
                    if ($request->hasFile("variants.$index.image")) {
                        $imagePath = $request->file("variants.$index.image")->store('variants', 'public');
                    }

                    $variant = ProductVariant::create([
                        'product_id'      => $product->id,
                        'sku'             => $variantData['sku'] ?? null,
                        'price'           => isset($variantData['price']) ? (int) str_replace('.', '', $variantData['price']) : 0,
                        'stock_quantity'  => $variantData['stock'] ?? 0,
                        'variant_image'   => $imagePath,
                    ]);

                    // Gắn thuộc tính cho biến thể
                    if (isset($variantData['attributes']) && is_array($variantData['attributes'])) {
                        foreach ($variantData['attributes'] as $attributeId => $valueId) {
                            ProductVariantAttribute::create([
                                'product_variant_id'  => $variant->id,
                                'attribute_id'        => $attributeId,
                                'attribute_value_id'  => $valueId,
                            ]);
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('list_product')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi khi thêm sản phẩm: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Đã có lỗi xảy ra: ' . $e->getMessage());
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

    public function edit_category($id)
    {
        $category = Category::findOrFail($id); // danh mục cần chỉnh sửa

        // Danh sách danh mục cha (loại trừ chính nó)
        $parentCategories = Category::whereNull('parent_id')
            ->where('id', '!=', $id)
            ->get();

        return view('backend.product.edit_category', [
            'category' => $category,
            'parentCategories' => $parentCategories,
        ]);
    }
    public function update_category(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'parent_id' => 'nullable|exists:categories,id|not_in:' . $id,
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'name.unique' => 'Đã có danh mục này trong hệ thống. Vui lòng nhập lại.',
            'parent_id.not_in' => 'Danh mục không thể là con của chính nó.',
            'parent_id.exists' => 'Danh mục cha không hợp lệ.',
        ]);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('list_category')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function delete_category($id)
    {
        $category = Category::findOrFail($id);

        // Nếu có danh mục con, bạn có thể chọn xóa đệ quy hoặc ngăn xóa
        if ($category->children()->count() > 0) {

            return redirect()->back()->with('error', 'Không thể xóa danh mục có danh mục con.');
        }

        $category->delete();

        return redirect()->route('list_category')->with('success', 'Xóa danh mục thành công!');
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
    public function attribute_edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('backend.product.edit_attribute', compact('attribute'));
    }
    public function attribute_update(Request $request, $id)
    {
        try {
            $attribute = Attribute::findOrFail($id);

            // Kiểm tra dữ liệu
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:attributes,name,' . $id,
            ], [
                'name.required' => 'Vui lòng nhập tên thuộc tính',
                'name.string' => 'Tên thuộc tính phải là chuỗi',
                'name.max' => 'Tên thuộc tính không quá 255 ký tự',
                'name.unique' => 'Tên thuộc tính đã tồn tại',
            ]);

            // Cập nhật
            $attribute->update([
                'name' => $validatedData['name'],
            ]);

            return redirect()->route('list_attribute')->with('success', 'Cập nhật thuộc tính thành công!');
        } catch (\Exception $e) {
            // Ghi log nếu muốn: Log::error($e);
            return redirect()->back()
                ->withInput() // Giữ lại input đã nhập
                ->with('error', 'Có lỗi xảy ra khi cập nhật: ' . $e->getMessage());
        }
    }
    // Xóa nhóm thuộc tính
    public function attribute_delete($id)
    {
        $attribute = Attribute::findOrFail($id);

        // Nếu có liên kết attribute_values thì xử lý tùy logic (ngăn xóa hoặc xóa kèm)
        if ($attribute->values()->exists()) {
            return redirect()->back()->with('error', 'Không thể xóa thuộc tính đang có giá trị.');
        }

        $attribute->delete();

        return redirect()->route('list_attribute')->with('success', 'Xóa thuộc tính thành công');
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
    public function attri_value_edit($id)
    {
        $attributeValue = AttributeValue::findOrFail($id);
        $attributes = Attribute::all();

        return view('backend.product.edit_attri_value', [
            'attributeValue' => $attributeValue,
            'attributes' => $attributes,
        ]);
    }
    public function attri_value_update(Request $request, $id)
    {
        $attributeValue = AttributeValue::findOrFail($id);

        $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:100|unique:attribute_values,value,' . $id,
            'image' => 'nullable|image|max:2048',
        ], [
            'attribute_id.required' => 'Bạn phải chọn nhóm thuộc tính.',
            'value.required' => 'Giá trị thuộc tính không được để trống.',
            'value.unique' => 'Tên thuộc tính đã tồn tại.',
            'value.string' => 'Tên thuộc tính phải là chuỗi kí tự.',
            'image.image' => 'File tải lên phải là hình ảnh.',
        ]);

        DB::beginTransaction();
        try {
            $attributeValue->update([
                'attribute_id' => $request->input('attribute_id'),
                'value' => $request->input('value'),
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('attribute_images', 'public');
                $attributeValue->update([
                    'image' => $imagePath
                ]);
            }

            DB::commit();
            return redirect()->route('attribute')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi khi cập nhật thuộc tính: ' . $e->getMessage());
            return redirect()->route('attribute')->with('error', 'Lỗi khi cập nhật thuộc tính!');
        }
    }
    public function attri_value_delete($id)
    {
        $attributeValue = AttributeValue::findOrFail($id);

        try {
            $attributeValue->delete();
            return redirect()->route('attribute')->with('success', 'Xóa thuộc tính thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa thuộc tính: ' . $e->getMessage());
            return redirect()->route('attribute')->with('error', 'Không thể xóa thuộc tính!');
        }
    }
}
