<?php
/**
 * GuardianInfo Model for WEM and Pastor with soft delete
 * @param Request $request
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuardianInfo extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $table = 'guardianInfo';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $softDelete = true;

}
