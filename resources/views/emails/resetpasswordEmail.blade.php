<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
            padding: 0;
            background: #e2e2e2;
        }

        @media screen and (max-width:599px){
            table[class="container"]{
                width: 480px !important;
            }
            img{
                max-width: 100%;
            }
        }
        @media screen and (max-width:479px){
            table[class="container"]{
                width: 320px !important;
            }
        }
    </style>
</head>
<body>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="font-family: arial;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="0" width="600" class="container" style="background: #fff;">
                    <tr>
                        <td style="background: #003b7b; color:#fff; text-align: center; font-size: 18px; padding: 14px 10px;">
                                <span style="color: #99cc33;">Need Help?</span> 1-855-965-1789
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <a href="{{env('BASE_URL')}}">
                            <img src="{{env('BASE_URL')}}/images/logo.jpg" alt="simplywilled.com" style="display: block;">
                          </a>
                        </td>
                    </tr>
                    <tr>
                      <td style="padding:0 30px; background: #f2f2f2;">
                          <h1 style="color: #0a5dab; font-size: 30px; padding: 30px 0 20px;">Hi, {{ $name }} </h1>
                          <p style="color: #373737; font-size: 20px; line-height: 30px;">
                            You have requested for reset your password. please click on below link to reset your password.
                          </p>
                          <p style="color: #373737; font-size: 20px; line-height: 30px;">
                            <strong style="color: #0a5dab; font-size: 30px; padding: 30px 0 20px;"><a href='{{$url}}'> Click here </a></strong>to reset password
                          </p>
                          <p style="margin-top: 7px;">For any queries please send mail : @
                            <a href="mailto:{{ $email }}">
                               {{ $email }}
                            </a>
                          </p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <!-- Contact & Follow Buttons -->
                        <div style="text-align: center;padding: 15px 0; background: #fff;">
                              <div style="text-align: center;">
                                  <br><br>
                                  <a href="{{env('BASE_URL')}}"><img src="{{env('BASE_URL')}}/images/callus.jpg" alt=""></a>
                                  <br>
                              </div>
                              <p style="text-align: center; padding-top:15px;">
                                  <span><a href="https://www.facebook.com/SimplyWilled"><img src="{{env('BASE_URL')}}/images/fd-icon.png"></a></span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span ><a href="https://twitter.com/simplywilled"><img src="{{env('BASE_URL')}}/images/ttr-icon.png"></a></span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span ><a href="https://www.linkedin.com/company/simplywilled.com"><img  src="{{env('BASE_URL')}}/images/in-icon.png"></a></span>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <span ><a href="https://www.instagram.com/simplywilled"><img src="{{env('BASE_URL')}}/images/gram-icon.png"></a></span>
                                  <br><br>
                              </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px 20px; background: #095cab; font-size: 14px; color: #6dadeb; text-align: center;">
                            Copyright © 2017-2018 Keep It Simple, LLC. All Rights Reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
