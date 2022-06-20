<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WartawanModel;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index()
    {
        $data['total_wartawan'] = WartawanModel::all()->count();
        $data['total_berita'] = 10;
        return view("backend.pages.beranda", $data);
    }
}
