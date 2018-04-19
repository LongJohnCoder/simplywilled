<?php
/**
 * Contactus Model for WEM and Pastor with soft delete
 * @param Request $request
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contactus extends Model
{
    use SoftDeletes,Notifiable,HasRoles;

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    protected $primaryKey = 'id';

    protected $table ='contact_us';
}
