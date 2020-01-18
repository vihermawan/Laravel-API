<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey='id_users';
    protected $table = 'users';
    protected $fillable = ['email','password'];
    // public function users_role(){
    //     return $this->hasMany(UsersRole::class,'id_users_role');
    // }
}
