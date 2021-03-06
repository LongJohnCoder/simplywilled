<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogComment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    protected $primaryKey = 'id';

    protected $table = 'blogComments';

    /*
     * function to fetch blog
     * */
    public function blog() {
        return $this->hasOne('App\Blogs','id','blog_id');
    }
}
