<?php
/**
* Controller for google indexing sitemap.xml generator
*/
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Blogs;

class SitemapController extends Controller
{
    /**
    * Generate sitemap.xml
    * @param
    * @response text/xml
    */
    public function sitemap()
    {

      $categories         = Categories::all();
      $blogs              = Blogs::all();
      $data               = [];
      $data['categories'] = $categories;
      $data['blogs']      = $blogs;
      $data['blogPages']  = floor(count($blogs)/10);
      $content            = view('sitemap')->with($data);
      \Storage::disk('sitemap')->put('sitemap.xml', $content);
        return response([
            'status' => true,
            'message' => 'Sitemap successfully generated.'
        ],200);
      /*return response($content)
          ->header('Content-Type', 'text/xml');*/
    }
}
