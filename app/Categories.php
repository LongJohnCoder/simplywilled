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

    public function blogMapping(){
        return $this->hasMany('App\CategoryBlogMapping','category_id','id');
    }

    public function blogs() {
    	return $this->hasManyThrough(
            'App\Blogs',
            'App\CategoryBlogMapping',
            'category_id', // Foreign key on CategoryBlogMapping table...
            'id', // Foreign key on blogs table...
            'id', // Local key on Categories table...
            'blog_id' // Local key on CategoryBlogMapping table...
        );
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
           $model->slug = str_slug($model->name);
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
