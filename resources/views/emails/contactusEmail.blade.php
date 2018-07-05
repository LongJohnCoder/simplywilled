<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
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
                <table cellpadding="0" cellspacing="0" border="0" width="600" class="container">
                    <tr>
                        <td style="background: #003b7b; color:#fff; text-align: center; font-size: 18px; padding: 14px 10px;">
                                <span style="color: #99cc33;">Need Help?</span> 1-855-965-1789
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{url('/')}}/images/logo.jpg" alt="simplywilled.com" style="display: block;">
                        </td>
                    </tr>
                    <tr>
                      <td style="padding:0 30px; background: #f2f2f2;">
                          <h1 style="color: #0a5dab; font-size: 30px; padding: 30px 0 20px;">Contact Us On Simply Willed</h1>
                          <p style="color: #373737; font-size: 20px; line-height: 30px;">
                            Name: {{$data['name']}}<br>
                            Email: {{$data['email']}}<br>
                            Message: {{$data['message']}}<br>
                          </p>
                          <p style="color: #373737; font-size: 20px; line-height: 30px;">
                            <strong style="color: #0a5dab; font-size: 30px; padding: 30px 0 20px;"><a href='{{$url}}'> Click here </a></strong>to reset password
                          </p>
                          <p style="color: #373737; font-size: 20px; line-height: 30px;">
                            Sincerely,<br><strong style="color: #0a5dab;"> SimplyWilled’s team </strong><br><br>
                          </p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <!-- Contact & Follow Buttons -->
                        <div style="text-align: center;padding: 30px 0;">
                          <div style="text-align: center;">
                              <img src="{{url('/')}}/images/callus.jpg" style="height: 155px; margin-top: 0px;" alt="">
                          </div>
                          <ul style="list-style-type: none; text-align:center;">
                              <li style="display: inline-block; padding: 5px; "><a href="https://www.facebook.com/SimplyWilled"><img src="{{url('/')}}/images/fd-icon.png"></a></li>
                              <li style="display: inline-block; padding: 5px;"><a href="https://twitter.com/simplywilled"><img src="{{url('/')}}/images/ttr-icon.png"></a></li>
                              <li style="display: inline-block; padding: 5px;"><a href="https://www.linkedin.com/company/simplywilled.com"><img  src="{{url('/')}}/images/in-icon.png"></a></li>
                              <li style="display: inline-block; padding: 5px;"><a href="https://www.instagram.com/simplywilled"><img src="{{url('/')}}/images/gram-icon.png"></a></li>
                            </ul>
                        </div></td>
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
