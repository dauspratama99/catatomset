<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Users extends Model
{
    use HasFactory;
    protected $table = "tb_user";
    protected $primaryKey = "id_user";
    public $timestamps = false;


    public static function ChekLoginUser($username, $password)
    {
        $data_user = DB::table('tb_user')->where("username", $username)->first();
        
        if($data_user == TRUE)
        {
            if(password_verify($password, $data_user->password))
            {
                return $data_user;
            }
        }else{
            return false;
        }
    }
}
