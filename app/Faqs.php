<?php
/**
 *  Faqs Model for WEM and Pastor with soft delete
 * @param Request $request
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faqs extends Model
{
    use SoftDeletes, Notifiable, HasRoles;

    protected $table = 'faqs';

    protected $dates = ['deleted_at'];

    protected $primaryKey = 'id';

    protected $softDelete = true;

    /*
     * function to fetch faq category
     * */
    public function faqCategory(){
        return $this->hasMany('App\FaqCategoryMapping','faq_id','id');
    }

    public function faqMapping(){
        return $this->hasMany('App\FaqCategoryMapping','id');
    }

    public function category() {
        return $this->hasManyThrough(
            'App\FaqCategories',
            'App\FaqCategoryMapping',
            'faq_id', // Foreign key on CategoryBlogMapping table...
            'id', // Foreign key on blogs table...
            'id', // Local key on Categories table...
            'faq_category_id' // Local key on CategoryBlogMapping table...
        );
    }
}
