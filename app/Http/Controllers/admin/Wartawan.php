<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WilayahModel;
use Illuminate\Http\Request;
use App\Models\WartawanModel;
use Illuminate\Support\Facades\DB;

class Wartawan extends Controller
{
    public function index()
    {
        $data['wartawan_data'] = WartawanModel::getWartawan();
        $data['wilayah'] = WilayahModel::all()->toArray();
        return view('backend.pages.wartawan', $data);
    }
    public function post_tambah_wartawan(Request $request)
    {
        $data = array();
        foreach ($request->post() as $p => $k) {
            if ($p !== "_token" && $p !== 'submit') {
                $data[$p] = $k;
            }
        }
        $kode = "WHN-".substr(rand(), 0,3);
        $data['kode'] = $kode;
        if (DB::table('tb_wartawan')->insert($data)){
            session()->flash("messages", "Tambah data berhasil");
            return redirect(route("admin.wartawan"));
        }

    }
    public function delete(Request $request, $kode = null)
    {
        if ($kode === null) {
            session()->flash('messages', 'gagal menghapus data');
            return redirect(route('admin.wartawan'));
        }
    }
}
