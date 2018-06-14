<?php

/**
 * Functional Scope: Dashboard for admin-panel
 */

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Models\PasswordReset;
use Auth;
use Crypt;
use DB;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;
use Log;
use Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use App\Models\Packages;
use App\Helper\DateTimeHelper;
use App\Blogs;
use App\Models\BlogComment;
use App\Categories;

class DashboardController extends Controller
{
    /**
    * The dashboard for the admin panel
    * @params null
    * @return \Illuminate\Http\Response
    */
    public function fetchDashboard() {
      try {
        $data['totalUsers']       = User::count();
        $data['totalBlogs']       = Blogs::count();
        $data['totalComments']    = BlogComment::where('parent_comment_id',0)->count();
        $data['totalCategories']  = Categories::count();
        $data['users']            = User::with(array('loginHistory' => function($q) {
            $q->select('id', 'user_id', 'login_time', 'logout_time', 'ip_address');
            $q->orderBy('id', 'DESC');
            // $q->first();
          }))->where('id','!=', 1)
          ->orderBy('created_at','DESC')->limit(config('default_values.dashboard_default_user_count'))->get();
        return response()->json([
           'status'       => true,
           'message'      => 'Successfully fetched dashboard!',
           'data'         => $data
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
           'status'       => false,
           'message'      => 'Dashboard cannot be fetched!'.$e->getMessage().' Line : '.$e->getLine(),
           'data'         => null
        ], 400);
      }
    }
}
