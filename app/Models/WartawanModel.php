<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WartawanModel extends Model
{
    protected $table = 'tb_wartawan';
    public static function getWartawan($kode = null)
    {
        if ($kode === null) {
            $query = DB::table('tb_wartawan')->join('tb_wilayah','tb_wartawan.kode_wilayah','=', 'tb_wilayah.kode_wilayah','left')->get()->toArray();
        } else {
            $query = DB::table('tb_wartawan')->join('tb_wilayah','tb_wartawan.kode_wilayah','=', 'tb_wilayah.kode_wilayah','left')->where('tb_wartawan.kode', $kode)->get()->toArray();
        }
    return $query;
    }
}
