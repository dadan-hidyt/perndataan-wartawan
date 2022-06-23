<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeritaModel extends Model
{
    use HasFactory;
    protected $table = "tb_berita";

    public static function insertNewData(array $data)
    {
    	if (DB::table('tb_berita')->insert($data)) {
    		return true;
    	}
    	return false;
    }
    public static function get($id = null)
    {
        $data_berita = DB::table("tb_berita")
            ->select(['tb_wartawan.*','tb_wilayah.nama_wilayah','tb_berita.*'])
            ->join('tb_wartawan','tb_berita.kode_wartawan','=','tb_wartawan.kode','inner')
            ->join('tb_wilayah','tb_wartawan.kode_wilayah','=','tb_wilayah.kode_wilayah');
        if (!empty($id)) {
            $data_berita->where("tb_berita.id_berita",'=',$id);
            return $data_berita->get();
        }
        return $data_berita->get()->toArray();
    }
    public static function findById($id)  {
        if (DB::table('tb_berita')->where('id_berita','=',$id)) {
            return true;
        } else {
            return false;
        }
    }
}
