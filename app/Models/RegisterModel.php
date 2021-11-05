<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    public $timestamps = false;
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
         'username', 'password', 'level_user',
    ];
}
