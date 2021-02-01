<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'tb_data_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_nama','cabang_id','user_level','user_username','user_password','user_ulangi_password'
    ];
}
