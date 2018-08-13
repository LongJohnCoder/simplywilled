<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">

    <style type="text/css" rel="stylesheet" media="all">
        h3{
            font-size:25px;
            color:#000000;
            font-weight:300;
            margin:0;
            line-height:32px;
            font-family: 'Lato', sans-serif;
            text-align:left;
        }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #edf0f3;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 10px; background-color: #edf0f3;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 5px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0;',
    'email-body_inner' => 'width: auto; max-width: 600px; margin: 70px auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 600px; margin: 0 auto 70px; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 10px 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #40a52f;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin: 0; color: #707070; font-size: 15px; line-height: 1.5em; text-align: justify;',
    'paragraph-sub' => 'margin-top: 10px; margin-bottom: 0; color: #FFFFFF; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: inline-block; min-height: 20px; padding: 15px;
                 background-color: #3869D4; border-radius: 5px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #4db228;',
    'button--red' => 'background-color: #ee1818;',
    'button--blue' => 'background-color: #3869D4;',
    'accept-btn' => 'width: 130px',
    'decline-btn' => 'width: 300px',

    /* Helper ------------------------------ */
    'border-green-2x' => 'border: 2px solid #4db228;',
    'width-100' => 'width: 100%',
    'margin-top-40' => 'margin-top: 40px;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
<table width="100%" cellpadding="0" cellspacing="0" style="background: #fff;">
    <tr>
        <td style="{{ $style['email-wrapper'] }}" align="center">
            <table width="100%" cellpadding="0" cellspacing="0" style="{{ $style['border-green-2x'] }}">
                <!-- Logo -->
                <tr>
                    <td style="{{ $style['email-masthead'] }}">
                        <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ env('BASE_URL') }}" target="_blank">
                            <img src="{!! asset('images/mail-logo.png') !!}" alt="{{ config('app.name') }}">
                        </a>
                    </td>
                </tr>

                <!-- Email Banner -->
                <tr>
                    <td>
                        <img style="{{ $style['width-100'] }}" src="{!!$data['banner']!!}" alt="{{ config('app.name') }}">
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td style="{{ $style['email-body'] }}" width="100%">
                        <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }}">

                                    <!-- Greeting -->
                                <!--<h1 style="{{ $style['header-1'] }}">
                                            <?php /*?>{{$data['title']}}<?php */?>
                                        </h1>-->
                                    <div style="{{ $style['paragraph'] }}">
                                        {!!$data['short_description']!!}
                                    </div>
                                    <!-- Salutation -->
                                <!--<p style="{{ $style['paragraph'] }}">
                                            Regards,<br>{{ config('app.name') }}
                                        </p>-->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
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
                <!-- Footer -->
                <tr>
                    <td>
                        <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }}">
                                    <p style="{{ $style['paragraph'] }}">
                                        Copyright © 2017 Keep It Simple, LLC. All Rights Reserved.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
