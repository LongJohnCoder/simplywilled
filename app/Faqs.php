<?php
/**
 * Faq Model for WEM and Pastor with soft delete
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
}
