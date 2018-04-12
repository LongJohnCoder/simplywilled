<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalRepresentatives extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $table = 'personalRepresentatives';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $softDelete = true;
}
