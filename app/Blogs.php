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

    public function category() {
        return $this->hasManyThrough(
            'App\Categories',
            'App\CategoryBlogMapping',
            'blog_id', // Foreign key on CategoryBlogMapping table...
            'id', // Foreign key on blogs table...
            'id', // Local key on Categories table...
            'category_id' // Local key on CategoryBlogMapping table...
        );
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
           $model->slug = str_slug($model->title);
           $latestSlug =
               static::whereRaw("slug = '$model->slug' or slug LIKE '$model->slug-%'")
                   ->latest('id')
                   ->value('slug');
           if ($latestSlug) {
               $pieces = explode('-', $latestSlug);

               $number = intval(end($pieces));

               $model->slug .= '-' . ($number + 1);
           }
       });
    }
}
