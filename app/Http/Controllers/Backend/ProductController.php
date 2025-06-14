<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add_category()
    {
        return view('backend.product.add_category');
    }

    public function list_category()
    {
        return view('backend.product.list_category');
    }

    public function add_product()
    {
        return view('backend.product.add_product');
    }

    public function list_product()
    {
        return view('backend.product.list_product');
    }
    public function list_attribute()
    {
        return view('backend.product.list_attribute');
    }
    public function attribute()
    {
        return view('backend.product.attribute');
    }
}
