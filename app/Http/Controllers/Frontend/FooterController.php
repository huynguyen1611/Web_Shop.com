<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function quydinh()
    {
        return view('fronend.part.footer.hotro.muahang');
    }
    public function huongdan()
    {
        return view('fronend.part.footer.hotro.huongdan');
    }
    public function thanhtoan()
    {
        return view('fronend.part.footer.hotro.thanhtoan');
    }
    public function gioithieu()
    {
        return view('fronend.part.footer.timhieu.gioithieu');
    }
    public function lienhe()
    {
        return view('fronend.part.footer.timhieu.lienhe');
    }
    public function vechungtoi()
    {
        return view('fronend.part.footer.timhieu.vechungtoi');
    }
    public function baomat()
    {
        return view('fronend.part.footer.chinhsach.baomat');
    }
    public function baohanh()
    {
        return view('fronend.part.footer.chinhsach.baohanh');
    }
    public function doitra()
    {
        return view('fronend.part.footer.chinhsach.doitra');
    }
    public function giaohang()
    {
        return view('fronend.part.footer.chinhsach.giaohang');
    }
}
