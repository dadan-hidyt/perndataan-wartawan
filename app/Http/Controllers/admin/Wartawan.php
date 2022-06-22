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
        if ($kode == null) {
            session()->flash('messages', 'gagal menghapus data');
            return redirect(route('admin.wartawan'));
        }
        if (DB::table('tb_wartawan')->where('kode','=',$kode)->count() > 0) {
            if (DB::table('tb_wartawan')->where("kode",'=', $kode)->delete()) {
                session()->flash('messages', 'Data berhasil di hapus');
                return redirect(route('admin.wartawan'));
            } else {
                session()->flash('messages', 'gagal menghapus data');
                return redirect(route('admin.wartawan'));
            }
        }
    }
    public function edit($kode = null)
    {
        if ($kode === null) {
            session()->flash('messages', 'gagal mengedit data!');
            return redirect(route('admin.wartawan'));
        }
        if (DB::table('tb_wartawan')->where('kode','=',$kode)->count() === 0) {
            session()->flash('messages', 'gagal mengedit data!');
            return redirect(route('admin.wartawan'));
        }
        $data_wilayah = WilayahModel::all()->toArray();
        $data = WartawanModel::getWartawan($kode);
        return view('backend.pages.edit_wartawan', ['data_wartawan'=>$data,'data_wilayah' => $data_wilayah]);
    }
    public function post_edit(Request $request)
    {
        $data = $request->post();
        $kode = $data['kode'];
        unset($data['_token']);
        unset($data['kode']);
        if (DB::table('tb_wartawan')->where('kode','=',$kode)->update($data)){
            session()->flash('messages', 'Data berhasil di update!');
            return redirect(route('admin.wartawan'));
        } else {
            session()->flash('messages', 'Data gagal di update!');
            return redirect(route('admin.wartawan'));
        }
    }
}
