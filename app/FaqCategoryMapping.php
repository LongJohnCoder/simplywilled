<?php
/**
 * Faq category mapping Model for WEM and Pastor with soft delete
 * @param Request $request
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FaqCategoryMapping extends Model
{
    use Notifiable, HasRoles;

    protected $table = 'faqCategoryMapping';

    protected $primaryKey = 'id';

    protected $softDelete = true;

    /*
     * function to get faq
     * */
    public function getFaq() {
        return $this->hasMany('App\Faqs','id','faq_id');
    }

    /*
     * function to get faqCategory
     * */
    public function getFaqCategory() {
        return $this->hasOne('App\FaqCategories','faq_category_id','id');
    }
}
