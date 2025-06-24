<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
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

    public function show($id)
    {
        // Eager load các quan hệ cần thiết:
        $product = Product::with([
            'category',
            'images',
            'variants.variantAttributes.attribute',
            'variants.variantAttributes.value',
        ])->findOrFail($id);

        return view('fronend.product.product_detail', compact('product'));
    }
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
    public function cart()
    {
        return view('fronend.cart');
    }
    public function pay()
    {
        return view('fronend.pay');
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
