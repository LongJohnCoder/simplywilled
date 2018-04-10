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
}
