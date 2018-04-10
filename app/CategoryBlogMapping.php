<?php
/**
 * Category Blog Model for WEM and Pastor with soft delete
 * @param Request $request
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryBlogMapping extends Model
{
    use HasRoles;

    protected  $table = 'categoryBlogMapping';

}
