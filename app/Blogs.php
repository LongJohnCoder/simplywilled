<?php
/**
 * Blog Model for WEM and Pastor with soft delete
 * @param Request $request
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    use SoftDeletes,Notifiable,HasRoles;

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    protected $primaryKey = 'id';

    /*
     * function to get blog category
     * */
    public function blogCategory(){

        return $this->hasMany('App\CategoryBlogMapping','blog_id','id');
    }

    /*
     * function to get all comments for a blog
     * */
    public function getComments(){
        return $this->hasMany('App\Models\BlogComment','blog_id','id');
    }

}
