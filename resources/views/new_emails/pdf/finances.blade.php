<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                            <p style="color: #373737; font-size: 20px; line-height: 30px; padding-top: 32px; padding-bottom: 32px;">
                                <span>
                                    Dear {{$tellUsAboutYou['firstname']}},<br><br>

                                        Thank you for choosing simplywilled.com. Please find the attached pdf file as PDF document. For any issue or query please contact to our customer support team.<br><br>

                                        Sincerely,<br>

                                        Simplywilled Team<br>
                                </span>
                            </p>
                          {{--  <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding-right: 15px; width: 84px;" valign="top"><img src="{{url('/')}}/images/greenIcon.png" alt=""></td>
                                    <td>
                                        <h2 style="color: #2782be; font-size: 20px; padding-bottom: 7px;">PROTECT YOUR LOVED ONES</h2>
                                        <p style="color: #373737; font-size: 14px;">Name guardians and list beneficiaries so those you love are in good hands.</p>
                                    </td>
                                </tr>
                            </table> --}}
                        </td>
                        <tr>
                          <td>
                            <!-- Contact & Follow Buttons -->
                            <div style="text-align: center;padding: 15px 0;">
                              <div style="text-align: center;">
                                  <img src="{{url('/')}}/images/callus.jpg" style="height: 155px; margin-top: -40px;" alt="">
                              </div>
                              <ul style="list-style-type: none; margin-top: -8px; text-align: center;">
                                  <li style="display: inline-block; padding: 5px; "><a href="https://www.facebook.com/SimplyWilled"><img src="{{url('/')}}/images/fd-icon.png"></a></li>
                                  <li style="display: inline-block; padding: 5px;"><a href="https://twitter.com/simplywilled"><img src="{{url('/')}}/images/ttr-icon.png"></a></li>
                                  <li style="display: inline-block; padding: 5px;"><a href="https://www.linkedin.com/company/simplywilled.com"><img  src="{{url('/')}}/images/in-icon.png"></a></li>
                                  <li style="display: inline-block; padding: 5px;"><a href="https://www.instagram.com/simplywilled"><img src="{{url('/')}}/images/gram-icon.png"></a></li>
                                </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>
                            <td style="padding: 30px 20px; background: #095cab; font-size: 14px; color: #6dadeb; text-align: center;">
                                Copyright © 2017-2018 Keep It Simple, LLC. All Rights Reserved.
                            </td>
                        </tr>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
