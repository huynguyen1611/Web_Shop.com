<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute as ModelsAttribute;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Customer;
use App\Models\Voucher;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index()
    {
        // Lấy sản phẩm từng danh mục
        $manHinh = Product::with('images')
            ->where('category_id', 9)
            ->get();

        $dienThoai = Product::with('images')
            ->where('category_id', 1)
            ->get();

        $laptop = Product::with('images')
            ->where('category_id', 6)
            ->get();

        $products = Product::with('thumbnail')->get();
        $products = Product::all();
        return view('fronend.home', [
            'products' => $products,
            'manhinhs' => $manHinh,
            'dienthoais' => $dienThoai,
            'laptops' => $laptop,
        ]);
    }
    public function product()
    {
        $products = Product::with('thumbnail')->get();
        $products = Product::all();
        return view('fronend.product.index', [
            'products' => $products,
        ]);
    }



    // //Xóa từng sản phẩm đã xem **
    public function removeViewedProduct($id)
    {
        $viewed = session('viewed_products', []);
        $viewed = array_filter($viewed, fn($pid) => $pid != $id);
        session(['viewed_products' => $viewed]);
        return response()->json(['status' => 'ok']);
    }
    // //Xóa tất cả sản phẩm đã xem **
    public function clearViewedProducts()
    {
        session()->forget('viewed_products');
        return response()->json(['status' => 'ok']);
    }
    //Điện thoại **
    public function mobile()
    {
        // lấy danh sách sản phẩm nổi bật
        $products = Product::with('thumbnail')
            ->latest() // hoặc bất kỳ logic nào bạn muốn
            ->limit(5)
            ->get();
        $mobiles = Product::with('images')->where('category_id', 1)->get();
        return view('fronend.product.didong', [
            'mobiles' => $mobiles,
            'products' => $products,
        ]);
    }
    //Laptop **
    public function computer()
    {
        // lấy danh sách sản phẩm nổi bật
        $products = Product::with('thumbnail')
            ->latest() // hoặc bất kỳ logic nào bạn muốn
            ->limit(5)
            ->get();
        $computers = Product::with('images')->where('category_id', 6)->get();
        return view('fronend.product.maytinh', [
            'computers' => $computers,
            'products' => $products,
        ]);
    }
    //Màn hình **
    public function screen()
    {
        $products = Product::with('thumbnail')
            ->latest() // hoặc bất kỳ logic nào bạn muốn
            ->limit(5)
            ->get();
        $screens = Product::with('images')->where('category_id', 9)->get();
        return view('fronend.product.manhinh', [
            'screens' => $screens,
            'products' => $products,
        ]);
    }

    // Chi tiết sản phẩm **
    public function show($id)
    {
        // 1. Lấy sản phẩm và eager load
        $product = Product::with([
            'category',
            'images',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value',
            'variants.variantAttributes.attributeValue',
        ])->findOrFail($id);
        // 2. Lấy màu sắc và dung lượng
        $colorValues = $product->variants->flatMap->variantAttributes
            ->where(fn($va) => $va->attributeValue->attribute->name === 'Màu sắc')
            ->unique('attribute_value_id');

        $capacityValues = $product->variants->flatMap->variantAttributes
            ->where(fn($va) => $va->attributeValue->attribute->name === 'Dung lượng')
            ->unique('attribute_value_id');

        // 3. Sản phẩm cùng danh mục cha
        $relatedProducts = Product::with('images')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();

        // 4. Danh sách thuộc tính
        $attributes = Attribute::with('values')->get();

        // 5. Cập nhật sản phẩm đã xem
        $viewed = session('viewed_products', []);
        if (!in_array($id, $viewed)) {
            array_unshift($viewed, $id); // thêm vào đầu
            $viewed = array_slice($viewed, 0, 10); // tối đa 10
            session(['viewed_products' => $viewed]);
        }

        // 6. Lấy danh sách sản phẩm đã xem
        $viewedIds = session('viewed_products', []);
        $viewedProducts = Product::with('images')
            ->whereIn('id', $viewedIds)
            ->get();

        $firstVariant = $product->variants->first();
        return view(
            'fronend.product.product_detail',
            compact(
                'product',
                'attributes',
                'colorValues',
                'capacityValues',
                'relatedProducts',
                'viewedProducts',
                'firstVariant'
            )
        );
    }
    // Xử lí thêm sản phẩm vào giỏ hàng **
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        // $productName = $request->input('product_name'); // Lấy thêm tên sản phẩm
        $title = $request->input('title');
        // $fullTitle = $productName . ' - ' . $title;
        $variantId = $request->input('variant_id');
        $productId = $request->input('product_id');
        $qty = $request->input('qty');
        $price = $request->input('price');
        $image = $request->input('image');
        $discount = $request->input('discount_percent');

        // Nếu sản phẩm đã có trong giỏ, cộng dồn số lượng
        if (isset($cart[$variantId])) {
            $cart[$variantId]['qty'] += $qty;
        } else {
            $cart[$variantId] = [
                'product_id' => $productId,
                'variant_id' => $variantId,
                'title' => $title,
                'qty' => $qty,
                'price' => $price,
                'image' => $image,
                'discount_percent' => $discount,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Đã thêm vào giỏ hàng');
    }
    // Hiển thị giỏ hàng **
    public function cart()
    {
        // Lấy tất cả voucher còn hiệu lực
        $vouchers = Voucher::where('status', 1)
            ->where('quantity', '>', 0)
            ->where(function ($q) {
                $q->whereNull('start_date')->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', now());
            })
            ->get();

        $cart = session('cart', []);
        return view('fronend.cart', compact('cart', 'vouchers'));
    }
    //Xử lí thêm voucher **
    public function applyVoucher(Request $request)
    {
        $code = $request->input('code');
        $voucher = Voucher::where('code', $code)
            ->where('status', 1)
            ->where('quantity', '>', 0)
            ->where(function ($q) {
                $q->whereNull('start_date')->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', now());
            })
            ->first();

        if (!$voucher) {
            return response()->json(['success' => false, 'message' => 'Voucher không hợp lệ hoặc đã hết hạn']);
        }
        // Tính tổng giỏ hàng
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['qty'] * $item['price']);

        // Tính giảm giá
        $discount = $voucher->calculateDiscount($total);

        // Lưu vào session
        session([
            'voucher_code' => $voucher->code,
            'voucher_discount' => $discount
        ]);

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'discount_format' => number_format($discount, 0, ',', '.') . 'đ',
            'total_after' => $total - $discount,
            'total_after_format' => number_format($total - $discount, 0, ',', '.') . '₫',
        ]);
    }
    // Xủ lí xóa voucher **
    public function removeVoucher(Request $request)
    {
        session()->forget(['voucher_code', 'voucher_discount']);

        // Tính lại tổng
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['qty'] * $item['price']);

        return response()->json([
            'success' => true,
            'total_after_format' => number_format($total, 0, ',', '.') . '₫',
        ]);
    }
    // Xử lí cập nhật giỏ hàng bằng ajax **
    public function updateAjax(Request $request)
    {
        $variantId = $request->input('product_id');
        $qty = (int) $request->input('product_qty');

        $cart = session('cart', []);
        if (isset($cart[$variantId])) {
            $cart[$variantId]['qty'] = $qty;
            session(['cart' => $cart]);

            $lineTotal = $cart[$variantId]['qty'] * $cart[$variantId]['price'];
            $total = collect($cart)->sum(fn($item) => $item['qty'] * $item['price']);

            $discount = session('voucher_discount', 0);
            $totalAfter = $total - $discount;

            return response()->json([
                'price' => $lineTotal,
                'total' => $total,
                'discount' => $discount,
                'total_after' => $totalAfter,
                'price_format' => number_format($lineTotal, 0, ',', '.') . '₫',
                'total_format' => number_format($total, 0, ',', '.') . '₫',
                'discount_format' => number_format($discount, 0, ',', '.') . '₫',
                'total_after_format' => number_format($totalAfter, 0, ',', '.') . '₫',
            ]);
        }

        return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
    }


    // Xử lý xóa sản phẩm ra khỏi giỏ hàng bằng ajax **
    public function removeItem(Request $request)
    {
        $variantId = $request->input('variant_id');
        $cart = session('cart', []);
        unset($cart[$variantId]);
        session(['cart' => $cart]);

        return response()->json(['success' => true]);
    }


    //Xử lý thanh toán **
    public function pay()
    {
        $customer = Customer::find(session('customer_id'));
        if (!$customer) {
            // Xử lý khi không tìm thấy, ví dụ:
            return redirect()->route('login')->with('error', 'Bạn chưa đăng nhập');
        }
        $cart = session('cart', []);
        $voucherCode = session('voucher_code');
        $voucherDiscount = session('voucher_discount', 0);

        $total = collect($cart)->sum(fn($item) => $item['qty'] * $item['price']);
        $totalAfterDiscount = $total - $voucherDiscount;
        $vouchers = Voucher::where('status', 1)
            ->where('quantity', '>', 0)
            ->where(function ($q) {
                $q->whereNull('start_date')->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', now());
            })
            ->get();

        return view('fronend.pay', compact(
            'cart',
            'voucherCode',
            'voucherDiscount',
            'total',
            'totalAfterDiscount',
            'vouchers',
            'customer',
        ));
    }















    public function news_technology()
    {
        return view('fronend.header.tincongnghe');
    }
    public function contact()
    {
        return view('fronend.header.lienhe');
    }
    public function article()
    {
        return view('fronend.header.tincongnghe');
    }
    public function support()
    {
        return view('fronend.header.article.support');
    }
    public function policy()
    {
        return view('fronend.header.article.policy');
    }
    public function news()
    {
        return view('fronend.header.article.news');
    }
    public function lienhetuvan()
    {
        return view('fronend.header.article.vechungtoi.lienhetuvan');
    }
    public function cauhoi()
    {
        return view('fronend.header.article.vechungtoi.cauhoi');
    }
}
