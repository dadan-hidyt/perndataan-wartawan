<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Berita extends Controller
{
   public function index()
   {
       $data_berita = "";
       return view('backend.pages.berita', array(
           "data_berita" => $data_berita
       ));
   }
}
