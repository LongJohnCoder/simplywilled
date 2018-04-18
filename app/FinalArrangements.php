<?php
/**
 * FinalArrangements Model for WEM and Pastor with soft delete
 * @param Request $request
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class FinalArrangements extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $table = 'finalArrangements';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $softDelete = true;
}
