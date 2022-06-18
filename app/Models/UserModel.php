<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    public $table = 'tb_admin';
    public $primaryKey = "user_id";
    public $fillable = [
      'nama',
      'username',
      'password'
    ];
}
