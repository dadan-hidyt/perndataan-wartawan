<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WartawanModel;
use Illuminate\Http\Request;
use App\Models\WilayahModel;
class Home extends Controller
{
    public function index()
    {
        $data['total_wartawan'] = WartawanModel::all()->count();
        $data['total_berita'] = 10;
        $data['wilayah'] = WilayahModel::all()->count();
        return view("backend.pages.beranda", $data);
    }
}
