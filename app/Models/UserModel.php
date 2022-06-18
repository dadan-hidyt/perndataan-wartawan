<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserModel extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    public $table = 'tb_admin';
    public $primaryKey = "user_id";
    public $fillable = [
      'nama',
      'username',
      'password'
    ];

}
