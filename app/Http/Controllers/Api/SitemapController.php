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
      $content            = view('sitemap')->with($data);
      return response($content)
          ->header('Content-Type', 'text/xml');
    }
}
