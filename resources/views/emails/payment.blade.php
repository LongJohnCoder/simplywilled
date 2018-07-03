<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  .header-title {
    font-family: caecilia;
    font-size: 36px;
    font-weight: 300;
    font-style: italic;
    line-height: 1.03;
    text-align: center;
    color: #2dbe60;
  }
  .note-content {
      font-family: gotham;
      font-size: 16px;
      font-weight: normal;
      line-height: 1.75;
      color: #4a4a4a;
  }
  @keyframes checkmark {
    0% {stroke-dashoffset: 69px;}
    100% { stroke-dashoffset: 0;}
}

@keyframes checkmark-circle {
    0% {stroke-dashoffset: 396px;}
    100% {stroke-dashoffset: 0px;}
}
.inlinesvg .svg svg {
    display: inline;
}
.icon--order-success svg path {
    -webkit-animation: checkmark 0.5s ease-in-out 0.7s backwards;
    animation: checkmark 0.5s ease-in-out 0.7s backwards
}

.icon--order-success svg circle {
    -webkit-animation: checkmark-circle 0.6s ease-in-out backwards;
    animation: checkmark-circle 0.6s ease-in-out backwards;
}

.main-content.paymentSuccess {
    width: 500px;
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
    float: right;
    text-align: center;
    color: #373737;
    margin-right: -80px;
}
svg {
    margin: 0 auto;
    width: 135px;
    display: block;
}
.main-content.paymentSuccess h2 {
    color: #2479b8;
    margin-bottom: 25px;
}

.paymentDetails{
    width: 100%;
    float: left;
    overflow: hidden;
    margin-bottom: 0;
}
.paymentDetails{
    width: 100%;
    float: left;
}
.paymentDetails li{
    border: 1px solid #ccc;
    border-bottom: 0;
    width: 100%;
    float: left;
}
.paymentDetails li:first-child {
    border-radius: 5px 5px 0 0;
}
.paymentDetails li:last-child {
    border-bottom: 1px solid #ccc;
    border-radius: 0 0 5px 5px;
}
.paymentDetails li p{
    color: #373737;
    font-size: 14px;
    width: 40%;
    float: left;
    margin-bottom: 0;
    padding: 5px;
    border-left: 1px solid #ccc;
    text-align: left;
}
p.payMessage{
    font-family: 'OpenSans-Bold';
}
p.payDetailsHead{
    margin-bottom: 5px;
    font-family: 'OpenSans-Bold';
}
.paymentDetails li p:first-child {
    border-left: 0;
}
.paymentDetails li p:last-child {
    font-family: 'OpenSans-Semibold';
    color: #1376bb;
    width: 60%;
}
p strong{
    font-family: 'OpenSans-Bold';
}
.paymentDetails li p.green{
    color: #32b623;
    font-family: 'OpenSans-Bold';
}
.paymentDetails li p.red{
    color: #f3463a;
    font-family: 'OpenSans-Bold';
}

@media screen and (max-width: 1199px){
    .main-content.paymentSuccess{
        margin-right: -115px;
    }
}
@media screen and (max-width: 991px){
    .main-content.paymentSuccess{
        margin-right: -172px;
    }
}
@media screen and (max-width: 768px){
    .main-content.paymentSuccess{
        margin-right: 9px;
    }
}
@media screen and (max-width: 550px){
    .main-content.paymentSuccess{
        margin-right: 0;
    }
    .main-content.paymentSuccess{
        width: 100%;
    }
    .paymentDetails li p{
        word-wrap: break-word;
    }
}
@media screen and (max-width: 400px){
    .paymentDetails li p{
        font-size: 12px;
    }
    .paymentDetails li:last-child P{
        height: 50PX;
    }
}
  </style>
  <body>
    <div class="container">
      <div class="row header-title">
        Payment Confirmation Email
      </div>
      <div class="row note-content">
        Dear {{$userName}}
        <br>
        Thank you for choosing <a href="{{url('/')}}">SimplyWilled.com</a> to make your estate plan. Below are confirmation details for your transaction.
      </div>
      <div class="">
        <p style="text-align: center;padding: 15px 0;"><img src="{{url('/')}}/images/successImg.png" alt=""></p>
        <h2 style="color: #2479b8; margin-bottom: 25px; font-family: arial; font-weight: normal; font-size: 28px; text-align: center;">Thank You!</h2>
        <p style="font-family: arial; font-size:16px; color: #373737; text-align: center;">Your payment has been successfully completed</p>
        <p style="font-family: arial; font-size:16px; color: #373737; text-align: center;">Please <a href="{{url('/')}}">click here</a> to access dashboard.</p>
        <p style="font-family: arial; font-size:16px; color: #373737; text-align: center;"><strong>Please find the transaction details bellow:</strong></p>
        <table cellpadding="0" cellspacing="0" border="0" align="center" style="border: 1px solid #ccc; width: 100%; border-radius: 10px; font-family: arial; font-size:14px; color: #373737; max-width: 400px;">
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
      </div>
      <div style="text-align: center;padding: 15px 0;">
        <a href="{{url('/')}}/sign-in"><img src="{{url('/')}}/images/loginToAccount.jpg" alt="accept"></a>
      </div>

      <!-- Contact & Follow Buttons -->
      <div style="text-align: center;padding: 30px 0;">
        <div style="text-align: center;">
            <img src="{{url('/')}}/images/callus.jpg" style="height: 155px; margin-top: -40px;" alt="">
        </div>
        <ul style="list-style-type: none; text-align:center;">
            <li style="display: inline-block; padding: 5px; "><a href="https://www.facebook.com/SimplyWilled"><img src="{{url('/')}}/images/fd-icon.png"></a></li>
            <li style="display: inline-block; padding: 5px;"><a href="https://twitter.com/simplywilled"><img src="{{url('/')}}/images/ttr-icon.png"></a></li>
            <li style="display: inline-block; padding: 5px;"><a href="https://www.linkedin.com/company/simplywilled.com"><img  src="{{url('/')}}/images/in-icon.png"></a></li>
            <li style="display: inline-block; padding: 5px;"><a href="https://www.instagram.com/simplywilled"><img src="{{url('/')}}/images/gram-icon.png"></a></li>
          </ul>
      </div>
    </div>
  </body>
</html>
