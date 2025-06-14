<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('fronend.home');
    }
    public function product()
    {
        return view('fronend.product.index');
    }
    public function mobile()
    {
        return view('fronend.product.didong');
    }
    public function computer()
    {
        return view('fronend.product.maytinh');
    }
    public function screen()
    {
        return view('fronend.product.manhinh');
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
    public function edit_user()
    {
        return view('fronend.account.edit_user');
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
