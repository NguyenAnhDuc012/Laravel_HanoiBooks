<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $sachs = SanPham::all();
        $theloais = TheLoai::all();
        return view('front.home', compact('sachs', 'theloais'));
    }
}
