<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Common;

class Coupon extends Model
{
    protected $table = 'coupons';

    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
           $token = Common::getToken(6);
           $latestToken =
               static::whereRaw("token = '$token'")
                   ->latest('id')
                   ->value('token');
           if ($latestToken) {
             self::boot();
           } else {
             $model->token = $token;
           }
       });
    }
}
