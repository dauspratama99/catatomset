<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTokoModel extends Model
{
    public $timestamps = false;
    protected $table = 'tb_usertoko';
    protected $primaryKey = 'id_usertoko';
    protected $fillable = [
        'id_user','id_toko','nama_usertoko', 'nohp_usertoko', 'foto_usertoko'
    ];
}
