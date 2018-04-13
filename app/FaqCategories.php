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
}
