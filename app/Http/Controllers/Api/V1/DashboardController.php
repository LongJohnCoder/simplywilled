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
use App\Faqs;
use App\Models\Coupon;

class DashboardController extends Controller
{
    /**
    * The dashboard for the admin panel
    * @params null
    * @return \Illuminate\Http\Response
    */
    public function fetchDashboard() {
      try {
        $data['totalUsers']      = User::where('id','!=',1)->count();
        $data['totalBlogs']      = Blogs::count();
        $data['totalComments']   = BlogComment::where('parent_comment_id',0)->count();
        $data['totalCategories'] = Categories::count();
        $data['packages']        = Packages::count();
        $data['faqs']            = Faqs::count();
        $data['coupons']         = Coupon::count();
        $data['users']           = User::with(array('loginHistory' => function($q) {
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

    public function usersList()
    {
      try {
        $users = User::with(array('loginHistory' => function($q) {
                    $q->select('id', 'user_id', 'login_time', 'logout_time', 'ip_address');
                    $q->orderBy('id', 'DESC');
                  }))->where('id','!=', 1)
                  ->orderBy('created_at','DESC')->get();
        return response()->json([
           'status'       => true,
           'message'      => 'Successfully fetched users data!',
           'data'         => ['users' => $users]
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
           'status'       => false,
           'error'        => $e->getMessage(),
           'line'         => $e->getLine()
        ], 500);
      }

    }

    public function usersListPagination(Request $request)
    {
      try {
        $page = $request->page;
        $pageSize = $request->pageSize;


        $users = User::with(array('loginHistory' => function($q) {
                    $q->select('id', 'user_id', 'login_time', 'logout_time', 'ip_address');
                    $q->orderBy('id', 'DESC');
                  }))->where('id','!=', 1);

        $totalUsers = $users->count();

        if ($request->search != NULL) {
          $users = $users->where('name','like', '%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%');
        }

        if (empty($request->orderBy)) {
          $users = $users->orderBy('created_at','DESC');
        } else {
          foreach ($request->orderBy as $okey => $ovalue) {
            if ($ovalue != 'asc' || $ovalue != 'desc') {
                $users = $users->orderBy($okey, $ovalue);
            }
          }
        }

        $userCount = $users->count();
        $users = $users->offset(($page-1)*$pageSize)->limit($pageSize);

        $users = $users->get();
        return response()->json([
           'status'       => true,
           'message'      => 'Successfully fetched users data!',
           'data'         => ['users' => $users, 'userCount' => $userCount, 'totalUsers' => $totalUsers]
        ], 200);
      } catch (\Exception $e) {
        return response()->json([
           'status'       => false,
           'error'        => $e->getMessage(),
           'line'         => $e->getLine()
        ], 500);
      }
    }

    /**
    * Delete a user
    * @params Request
    * @return \Illuminate\Http\Response
    */
    public function userDelete(Request $request)
    {
      try {
        $user = User::find($request->user_id);
        if ($user) {
          $user->delete();
          return response()->json([
             'status'       => true,
             'message'      => 'User deleted successfully',
             'data'         => null
          ], 200);
        } else {
          return response()->json([
             'status'       => false,
             'message'      => 'User not found',
             'data'         => null
          ], 400);
        }
      } catch (\Exception $e) {
        return response()->json([
           'status'       => false,
           'message'      => $e->getMessage().' Line : '.$e->getLine(),
           'data'         => null
        ], 500);
      }
    }
}
