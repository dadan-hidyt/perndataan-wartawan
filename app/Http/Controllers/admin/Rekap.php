<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\WartawanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class Rekap extends Controller
{
    public function index()
    {
        /**
         *Rekap data sesuai kode wartawan
         * dan bulan
         *
         *
         **/
        $data['wartawan'] = WartawanModel::getWartawan();
        return view("backend.pages.rekap", $data);
    }
    public function export_excel(Request $request)  {
        $kode = $request->get('kode');
        $dari = $request->get('dari');
        $sampe = $request->get('sampe');
        if (empty($kode)) {
            return redirect('admin.rekap');
        }
        $data['wartawan'] = WartawanModel::getWartawan($kode);
        $berita = DB::table('tb_berita')->where('kode_wartawan','=',$kode)->whereBetween('tanggal_submit',[$dari,$sampe])->get()->toArray();
        $data['berita'] = $berita;
        if (count($berita) > 0) {
            return Excel::download(new UsersExport($data), 'rekap-'.$data['wartawan'][0]->nama.'.xlsx');
        }
    }
}
