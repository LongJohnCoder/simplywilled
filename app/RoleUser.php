<?php
/**
 * role user Model for WEM and Pastor with soft delete
 * @param Request $request
 */
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

    public function roleInfo() {
        return $this->hasOne('App\Role','id','role_id');
    }

    /*
     * function to fetch user
     * */
    public function user() {
        return $this->hasOne('App\User','user_id','id');
    }
}
