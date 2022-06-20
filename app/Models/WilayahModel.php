<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class WilayahModel extends Model
{
    protected $table = "tb_wilayah";
    public function insertDataWilayah(array $data) {
        return DB::table('tb_wilayah')->insert($data);
    }
    public function findByKode($key, $val) {
        return DB::table('tb_wilayah')->where($key, '=', $val)->count();
    }
    public function deleteByKode(string $kode) {
        return DB::table('tb_wilayah')->where('kode_wilayah','=',$kode)->delete();
    }
}
