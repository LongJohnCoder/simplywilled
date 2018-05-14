<?php

/**
 * Faq Category Model for WEM and Pastor with soft delete
 * @param Request $request
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqCategories extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $table = 'faqCategories';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $softDelete = true;

    /*
     * function to get faq_categories
     * */
    public function getFaqMapping() {
        return $this->hasMany('App\FaqCategoryMapping','faq_category_id','id');
    }

    public function faq() {
        return $this->hasManyThrough(
            'App\Faqs',
            'App\FaqCategoryMapping',
            'faq_category_id', // Foreign key on FaqCategoryMapping table...
            'id', // Foreign key on faqs table...
            'id', // Local key on FaqCategories table...
            'faq_id' // Local key on CategoryBlogMapping table...
        );
    }

    // public function blogs() {
    //     return $this->hasManyThrough(
    //         'App\Blogs',
    //         'App\CategoryBlogMapping',
    //         'category_id', // Foreign key on CategoryBlogMapping table...
    //         'id', // Foreign key on blogs table...
    //         'id', // Local key on Categories table...
    //         'blog_id' // Local key on CategoryBlogMapping table...
    //     );
    // }


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
