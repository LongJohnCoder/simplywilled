<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment successfull</title>
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
                          <h1 style="color: #0a5dab; font-size: 30px; padding: 30px 0 20px;">Dear {{$userName}}, </h1>
                          <p style="color: #373737; font-size: 20px; line-height: 30px;">
                            Thank you for choosing <a href="{{url('/')}}">SimplyWilled.com</a> to make your estate plan. Below are confirmation details for your transaction.
                          </p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p style="text-align: center;padding: 15px 0;"><img src="{{url('/')}}/images/successImg.png" alt=""></p>
                        <h2 style="color: #2479b8; margin-bottom: 25px; font-family: arial; font-weight: normal; font-size: 28px; text-align: center;">Thank You!</h2>
                        <p style="font-family: arial; font-size:16px; color: #373737; text-align: center;">Your payment has been successfully completed</p>
                        <p style="font-family: arial; font-size:16px; color: #373737; text-align: center;">Please <a href="{{url('/')}}">click here</a> to access dashboard.</p>
                        <p style="font-family: arial; font-size:16px; color: #373737; text-align: center;"><strong>Please find the transaction details bellow:</strong></p>
                        <table cellpadding="0" cellspacing="0" border="0" align="center" style="border: 1px solid #ccc; width: 100%; border-radius: 10px; font-family: arial; font-size:14px; color: #373737; max-width: 600px;">
                        <tr>
                        <td width="50%" style="padding: 10px; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc;">Transaction ID</td>
                        <td width="50%" style="padding: 10px; color: #2479b8; font-weight: bold; border-bottom: 1px solid #ccc;">{{$transactionID}}</td>
                        </tr>
                        <tr>
                        <td width="50%" style="padding: 10px; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc;">Package</td>
                        <td width="50%" style="padding: 10px; color: #2479b8; font-weight: bold; border-bottom: 1px solid #ccc;">{{$pkgName}}</td>
                        </tr>
                        <tr>
                        <td width="50%" style="padding: 10px; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc;">Amount</td>
                        <td width="50%" style="padding: 10px; color: #2479b8; font-weight: bold; border-bottom: 1px solid #ccc;">${{$amount}}</td>
                        </tr>
                        <tr>
                        <td width="50%" style="padding: 10px; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc;">Payment Status</td>
                        <td width="50%" style="padding: 10px; color: #2479b8; font-weight: bold; color: #32b623; border-bottom: 1px solid #ccc;">{{$paymentStatus}}</td>
                        </tr>
                        <tr>
                        <td width="50%" style="padding: 10px; border-right: 1px solid #ccc;">Payment Date</td>
                        <td width="50%" style="padding: 10px; color: #2479b8; font-weight: bold;">{{$paymentDate}}</td>
                        </tr>
                        </table>
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
