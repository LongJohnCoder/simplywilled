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
                <table cellpadding="0" cellspacing="0" border="0" width="600" class="container" style="background: #fff;">
                    <tr>
                        <td style="background: #003b7b; color:#fff; text-align: center; font-size: 18px; padding: 14px 10px;">
                                <span style="color: #99cc33;">Need Help?</span> 1-855-965-1789
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <a href="{{env('BASE_URL')}}">
                            <img src="{{env('BASE_URL')}}/images/logo.png" alt="simplywilled.com" style="display: block;">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0 30px; background: #f2f2f2;">
                            <p style="color: #373737; font-size: 20px; line-height: 30px; padding-top: 32px; padding-bottom: 32px;">
                                <strong style="color: #0a5dab; font-size: 30px; padding: 30px 0 20px;">Hello {{ucwords(trim(strtolower($friendFirstname)))}},</strong><br><br>
                                {{ucwords(trim(strtolower($fullName)))}} recently joined the thousands of people who have used <a href="{{env('BASE_URL')}}" target="_blank" style="font-weight: bold; color:#0a5dab;">SimplyWilled.com</a> to create their last will and testament and supporting estate plan documents.<br><br>
                                {{ucwords(trim($firstName))}} asked that we send you this email to invite you to sign up for SimplyWilled.com to get your affairs in order.
                            </p>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding-right: 15px; width: 84px;" valign="top"><img src="{{env('BASE_URL')}}/images/greenIcon.png" alt=""></td>
                                    <td>
                                        <h2 style="color: #2782be; font-size: 20px; padding-bottom: 7px;">PROTECT YOUR LOVED ONES</h2>
                                        <p style="color: #373737; font-size: 14px;">Name guardians and list beneficiaries so those you love are in good hands.</p>
                                    </td>
                                </tr>
                            </table>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding-right: 15px; width: 84px;" valign="top"><img src="{{env('BASE_URL')}}/images/greenIcon.png" alt=""></td>
                                    <td>
                                        <h2 style="color: #2782be; font-size: 20px; padding-bottom: 7px;">PROTECT YOUR ASSETS</h2>
                                        <p style="color: #373737; font-size: 14px;">Ensure the assets you’ve worked hard for pass to the ones you love.</p>
                                    </td>
                                </tr>
                            </table>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-bottom: 20px;">
                                <tr>
                                    <td style="padding-right: 15px; width: 84px;" valign="top"><img src="{{env('BASE_URL')}}/images/greenIcon.png" alt=""></td>
                                    <td>
                                        <h2 style="color: #2782be; font-size: 20px; padding-bottom: 7px;">SAVE TIME & MONEY</h2>
                                        <p style="color: #373737; font-size: 14px;">It takes less than 15 minutes and you're done. Try it today and see how simple preparing your last will and testament online can be.</p>
                                    </td>
                                </tr>
                            </table>
                            <p style="text-align: center; padding: 18px 0 32px;"><a href="{{env('BASE_URL')}}/register"><img src="{{env('BASE_URL')}}/images/getStartedNew.png" alt=""></a></p>

                        </td>
                        <!-- <tr>
                            <td style="background: #fff; padding: 45px 0;" align="center">
                                <table cellpadding="0" cellspacing="0" border="0" width="300">
                                    <tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-bottom:1px solid #e3e3e3; padding-bottom: 8px;">
                                               <tr>
                                                    <td style="padding-right: 10px;">
                                                        <img src="{{env('BASE_URL')}}/images/contactIcon.png" alt="">
                                                    </td>
                                                    <td style="font-size: 30px; color: #373737;">
                                                        1-(855) 965-1789
                                                        <br>
                                                        <span style="font-size: 18px; color: #373737;">Mon-Friday 10 A.M - 6 P.M.</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style="font-size: 18px; color: #373737; float: left; padding-top: 13px; margin-left: 2px;">Follow Us: </span>
                                            <a href="https://www.facebook.com/SimplyWilled" style=" float: left; padding-top: 10px; margin-left: 26px;">
                                                <img src="{{env('BASE_URL')}}/images/fd-icon.png" alt="Facebook">
                                            </a>
                                            <a href="https://twitter.com/simplywilled" style=" float: left; padding-top: 10px; margin-left: 26px;">
                                                <img src="{{env('BASE_URL')}}/images/ttr-icon.png" alt="Twitter">
                                            </a>
                                            <a href="https://www.linkedin.com/company/simplywilled.com" style=" float: left; padding-top: 10px; margin-left: 26px;">
                                                <img src="{{env('BASE_URL')}}/images/in-icon.png" alt="Linkedin">
                                            </a>
                                            <a href="https://www.instagram.com/simplywilled" style=" float: left; padding-top: 10px; margin-left: 26px;">
                                                <img src="{{env('BASE_URL')}}/images/gram-icon.png" alt="Instagram">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr> -->
                        <tr>
                          <td>
                            <!-- Contact & Follow Buttons -->
                            <div style="text-align: center;padding: 15px 0; background: #fff;">
                              <div style="text-align: center;">
                                  <br><br>
                                  <a href="{{env('BASE_URL')}}"><img src="{{env('BASE_URL')}}/images/callus.png" alt=""></a>
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
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
