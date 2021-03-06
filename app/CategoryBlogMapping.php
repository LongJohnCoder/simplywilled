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

    /*
     * function to get blog category
     * 
     */
    public function category(){
        return $this->hasOne('App\Categories','id','category_id');
    }

    /*
     * function to get blog
     * 
     */
	public function blog(){
        return $this->hasOne('App\Blogs','id','blog_id');
    }
}
