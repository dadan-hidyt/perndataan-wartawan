<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\WilayahModel;
use Illuminate\Http\Request;

class Wilayah extends Controller
{
    public function index()
    {
        $data['data_wilayah'] = WilayahModel::all();
        return view('backend.pages.wilayah', $data);
    }
    public function delete(Request $request, $id = null)
    {
        if ($id === null) {
            session()->flash('messages', 'gagal menghapus data');
            return redirect(route('admin.wilayah'));
        }
        if (WilayahModel::deleteByKode($id)) {
            session()->flash('messages', 'Berhasil menghapus data');
            return redirect(route('admin.wilayah'));
        } else {
            session()->flash('messages', 'Gagal menghapus data');
            return redirect(route('admin.wilayah'));
        }
    }
    public function add(Request $request)
    {
        if ($request->has("submit")) {
            $wilayah = $request->post("namawilayah");
            //proses
            $wilayah_split = str_split($wilayah);
            $singkat = "";
            for ($i = 0; $i < count($wilayah_split);$i++) {
                if ($i % 2 == 0) {
                    $singkat .= $wilayah_split[$i];
                }
            }
            $kode = "WHN-".strtoupper($singkat);
            $situs = $request->post('situs');

            $data = array(
                "kode_wilayah" => $kode,
                'nama_wilayah' => $wilayah,
                'situs' =>$situs
            );
            if (WilayahModel::findByKode('kode_wilayah', $kode) == 0) {
                if (WilayahModel::insertDataWilayah($data)){
                    session()->flash('messages', 'Data berhasil di tambahkan');
                    return redirect(route('admin.wilayah'));
                }
            } else {
                session()->flash('messages', 'Wilayah sudah ada di database');
                return redirect(route('admin.wilayah'));
            }
        }
    }
}
