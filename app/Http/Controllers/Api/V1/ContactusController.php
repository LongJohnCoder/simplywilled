<?php
/**
 * Functional Scope: API for Create,Edit,View,Delete contact us form.
 */

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\HttpBadRequestException;
use App\User;
use App\Role;
use App\Categories;
use App\Models\PasswordReset;
use App\Blogs;
use App\CategoryBlogMapping;
use App\Contactus;
use Auth;
use Crypt;
use DB;
use Validator;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;
use Log;
use Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\BlogComment;
use App\RoleUser;

class ContactusController extends Controller
{
    public function postContactUs(Request $request){
        try{
            $name = $request->name;
            $email = $request->email;
            $message = $request->message;

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required | email',
                'message' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validator->errors(),
                    'data' => []
                ], 400);
            }

            $createContact = new Contactus;
            $createContact->name = $name;
            $createContact->email = $email;
            $createContact->message = $message;
            if($createContact->save()){
                return $sendMail = $this->sendContactUsEmail($email, $name, $message);

            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'contact us form not saved',
                    'data' => []
                ], 400);
            }
        }catch(Exception $e){
            return response()->json([
                'status'       => false,
                'message'      => 'Failed to send email. Try with valid email id',
                // 'message'      => $e->getMessage(),
                'errorLineNo'  => $e->getLine()
            ], 500);
        }
    }

    /**
     *
     *function to send contact us email
     *
     */
    public function sendContactUsEmail($emailUser, $name, $message){
        if($emailUser && $name && $message){
            $data = array();
            $data['name'] = $name;
            $data['email'] = $emailUser;
            $data['message'] = $message;
            // return \View::make('emails.contactusEmail', $data);
            Mail::send('emails.contactusEmail', [
                'email'         => 'info@simplywilled.com',
                'data'          => $data,
            ], function ($mail) use ($emailUser,$name) {
                /** @noinspection PhpUndefinedMethodInspection */
                $mail->from('info@simplywilled.com', 'Simplywilled Contact Us');
                $mail->replyTo('support@simplywilledhelp.zendesk.com', 'Simplywilled Helpdesk');
                /** @noinspection PhpUndefinedMethodInspection */
                $mail->to($emailUser, $name)
                    ->subject('Thanks for contacting us [Simplywilled]');
            });
            return response()->json([
                'status' => true,
                'message' => 'Thanks for contacting with us',
                'data' => []
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'email/name not found,faild to send email',
                'data' => []
            ], 400);
        }
    }
}
