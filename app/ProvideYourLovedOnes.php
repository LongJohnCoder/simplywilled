<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProvideYourLovedOnes extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $table = 'provideYourLovedOnes';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $softDelete = true;
}
