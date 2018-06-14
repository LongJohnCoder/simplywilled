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
        <!--<div class="main-content paymentSuccess" >-->
        <div class="icon icon--order-success svg">
          <svg xmlns="http://www.w3.org/2000/svg" width="135px" height="160px">
            <g fill="none" stroke="#8EC343" stroke-width="10">
              <circle cx="70" cy="71" r="60" style="stroke-dasharray: 396px, 385px;stroke-dashoffset: 800px;"></circle>
              <path d="M52,69.778l9.93,9.909l25.444-25.393" style="stroke-dasharray: 69px, 50px;stroke-dashoffset: 0px;"></path>
            </g>
          </svg>
        </div>
        <h2>Thank You!</h2>
        <p class="payMessage">Your payment has been successfully completed</p>
        <p class="payDetailsHead"><strong>Please find the transaction details bellow:</strong></p>
        <ul class="paymentDetails">
          <li>
            <p>Transaction ID</p>
            <p>{{$transactionID}}</p>
          </li>
          <li>
            <p>Package</p>
            <p>{{$pkgName}}</p>
          </li>
          <li>
            <p>Amount</p>
            <p>${{$amount}}</p>
          </li>
          <li>
            <p>Payment Status</p>
            <p class="green">{{$paymentStatus}}</p>
          </li>
          <li>
            <p>Payment Date</p>
            <p>{{$paymentDate}}</p>
          </li>
        </ul>
      <!--</div>-->
      </div>
      <div class="row">
        <a href="{{url('/sign-in')}}">Sign In</a>
      </div>
      <div class="row">
        Share links
      </div>
    </div>
  </body>
</html>
