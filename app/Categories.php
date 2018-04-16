<?php
/**
 * Category Model for WEM and Pastor with soft delete
 * @param Request $request
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    protected $table = 'categories';
}
