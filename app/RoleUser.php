<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    /*
     * function to fetch role
     * */
    public function role() {
        return $this->hasOne('App\Role','role_id','id');
    }

    /*
     * function to fetch user
     * */
    public function user() {
        return $this->hasOne('App\User','user_id','id');
    }
}