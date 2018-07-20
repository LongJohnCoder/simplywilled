<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Role;
use App\Models\NewsletterSubscriber;
use Newsletter;

class NewsletterController extends Controller
{
    /**
     * Add subscribers to the newsletter service
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubscriber(Request $request){
        try{
            $subscriberEmail = trim($request->subscriberEmail);
            $validator = Validator::make($request->all(), [
                'subscriberEmail'       =>  'required|email|max:50',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors(),
                    'data'    => []
                ], 400);
            }
            $checkForExistEmail = NewsletterSubscriber::where('email',$subscriberEmail)->first();
            if(!$checkForExistEmail){
                $createSubscriber = new NewsletterSubscriber;
                $createSubscriber->email = $subscriberEmail;
                $createSubscriber->email_send_status = 0;
                $createSubscriber->status = 1;          // subscribe to the newslatter
                if($createSubscriber->save()){
                    try {
                      $res = Newsletter::subscribe($subscriberEmail);
                      if ($res == false) {
                        return response()->json([
                            'status'  => false,
                            'message' => 'This email ID is already subscribed. Use another email ID to subscribe our newsletter !',
                            'data'    => []
                        ], 200);
                      }
                      return response()->json([
                          'status' => true,
                          'message' => 'Thanks for subscribe our newslatter ',
                          'data' => ['subscriberDetails' => $createSubscriber]
                      ], 200);
                      $this->sendEmailToNewsletterSubscriber($createSubscriber->email);
                    } catch (\Exception $e) {
                      return response()->json([
                          'status'  => false,
                          'message' => $e->getMessage(),
                          'line'    => $e->getLine(),
                          'data'    => []
                      ], 500);
                    }
                }else{
                    return response()->json([
                        'status'  => false,
                        'message' => 'Something went wrong,cannot subscribe',
                        'data'    => []
                    ], 400);
                }
            }else{
                return response()->json([
                    'status'  => false,
                    'message' => 'This email ID is already subscribed. Use another email ID to subscribe our newsletter !',
                    'data'    => []
                ], 200);
            }
        }catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function unsubscribeNewsletter(Request $request)
    {
      $subscriberEmail = trim($request->subscriberEmail);
      $validator = Validator::make($request->all(), [
          'subscriberEmail'       =>  'required|email|max:50',
      ]);
      if ($validator->fails()) {
          return response()->json([
              'status'  => false,
              'message' => $validator->errors(),
              'data'    => []
          ], 400);
      }
      $checkForExistEmail = NewsletterSubscriber::where('email',$subscriberEmail)->first();
      if($checkForExistEmail){
        $createSubscriber->status = 0;          // unsubscribe to the newslatter
        $createSubscriber->save();
      }

      $res = Newsletter::unsubscribe($subscriberEmail);
      return response()->json([
          'status' => true,
          'message' => 'You have successfully unsubscribed our newsletter',
          'data' => ['subscriberDetails' => $createSubscriber]
      ], 200);
    }

    public function sendEmailToNewsletterSubscriber($emailId){
        $data = array();
        $data['title'] = "Simplywilled Newsletter";
        $data['banner'] = asset('images/personal-representative-mail-banner.jpg');
        $data['short_description'] ="<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>";
        //send email to personal representative
        Mail::send('emails.newsLatterEmail', [
            'email' => 'info@simplywilled.com',
            'data' => $data
        ], function ($mail) use ($emailId) {
            $mail->from('info@simplywilled.com', 'simplywilled');
            $mail->to($emailId, "simplywilled Newslatter")
                ->subject('Thanks for subscribe to simplywilled newsletter');
        });
        \Log::info('Email Send to the newslattersubscriber');
    }
}
