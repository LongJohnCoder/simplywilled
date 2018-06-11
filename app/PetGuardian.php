<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetGuardian extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $table = 'pets_guardian';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $softDelete = true;

    protected $fillable = [
       'user_id' , 'fullname' , 'relationship_with' , 'address' , 'country' , 'city' , 'state' , 'zip' , 'email_notification' ,'phone', 'email' , 'is_backup' , 'created_at' , 'updated_at','relationship_other'
    ];

}
