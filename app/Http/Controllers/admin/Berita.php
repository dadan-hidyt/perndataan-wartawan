<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Berita extends Controller
{
   public function index()
   {
       /**
        * Manual aja lah lier
        */
       $data_berita = DB::table("tb_berita")
           ->join('tb_wartawan','tb_berita.kode_wartawan','=','tb_wartawan.kode','inner')
           ->get()
           ->toArray();
       return view('backend.pages.berita', array(
           "data_berita" => $data_berita
       ));
   }
}
