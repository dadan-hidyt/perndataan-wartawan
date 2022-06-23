<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\WartawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class Berita extends Controller
{
   public function index()
   {
        $data_berita = BeritaModel::get();
        $data_wartawan = WartawanModel::getWartawan();
       return view('backend.pages.berita', array(
           "data_berita" => $data_berita,
           "data_wartawan" => $data_wartawan
       ));
   }
   public function edit(Request $request, $id = null)
   {
        if (!$request->ajax()) {
            return response()->json([
               "error" => 1,
               "message" => 'Bad request'
            ]);
        }
        if (BeritaModel::findById($id)) {
            $data = BeritaModel::get($id)->toArray();
            return view('backend.partials.edit_berita', ['data'=>$data]);
        } else {
            echo '12';
        }
   }
    public function post_edit(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->post();
            $id = $data['id'];
            $datas = [
                'judul_berita' => $data['judul_berita'],
                'link_berita' => $data['link_berita'],
                'tanggal_submit' => $data['tanggal_submit'],
            ];
            if (DB::table('tb_berita')->where('id_berita', $id)->update($datas)) {
                return response()->json([
                   'error' => 0,
                   'message' => "data berhasil di update"
                ]);
            } else {
                return response()->json([
                    'error' => 1,
                    'message' => "data gagal di update"
                ]);
            }
        } else {
            return response()->json([
               "error" => 1,
               'message' => "Bad request"
            ]);
        }
    }
   public function delete($id = null)
   {
        if (DB::table('tb_berita')->where("id_berita",'=',$id)->delete()) {
          //jika data sudah di hapus arahkan ke halaman berita
            session()->flash("messages", "Data berhasil di hapus!");
            return redirect(route("admin.berita"));
        }
   }
   public function post_tambah_berita (Request $request)
   {
       $post_data = $request->post();
       $kode_wartawan = $post_data['kode'];

       if(empty($kode_wartawan)) {
        session()->flash("messages", "Nama Wartawan tidak valid! Silahkan cobalagi");
        return redirect(route("admin.berita"));
       }
       $data = [
           'kode_wartawan' => $kode_wartawan,
           'judul_berita' => $post_data['judul_berita'],
           'link_berita' => $post_data['link_berita'],
           'tanggal_submit' => $post_data['tanggal_submit'],
           'link_berita' => $post_data['link_berita'],
           'honor' => 20000
       ];
       if (BeritaModel::insertNewData($data)) {
           session()->flash("messages", "Data berhasil di tambahkan");
           return redirect(route("admin.berita"));
       } else {
           session()->flash("messages", "Data gagal di tambahkan");
           return redirect(route("admin.berita"));
       }
   }

}
