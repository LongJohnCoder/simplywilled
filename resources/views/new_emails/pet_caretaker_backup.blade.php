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
                            <h1 style="color: #0a5dab; font-size: 30px; padding: 30px 0 20px;">{{$backupPetCaretaker}} (Pet caretaker 2nd Choice),</h1>
                            <p style="color: #373737; font-size: 20px; line-height: 30px;">
                                    <strong>{{ucwords(strtolower($firstName.' '.$middleName.' '.$lastName))}}</strong> recently joined the thousands of people who have used <a href="{{url('/')}}" target="_blank" style="color: #0a5dab;">SimplyWilled.com</a> to create their will and selected you to serve as their backup pet caretaker on their demise. Being selected as a Backup Pet Caretaker is an important role reserved for those we trust the most. This email is being sent to you so you can let <strong>{{ucwords(strtolower($firstName.' '.$middleName.' '.$lastName))}}</strong> know whether you accept or decline this honor.  
                                <br><br>
                                <strong style="font-size: 22px;">What being selected as Backup Pet Caretaker means for You:</strong>
                                <br><br>
                                As Backup Pet Caretaker you will be legally responsible for caring for <strong>{{ucwords(strtolower($firstName.' '.$middleName.' '.$lastName))}}’s</strong> pets after their 1st choise pet caretaker. You will have physical custody of their pets and will be responsible for their well being.   
                                <br><br>
                                <strong style="font-size: 22px;">Confirm you responsibility:</strong>
                                <br><br>
                                Your duties as Pet Caretaker do not take effect until the person who nominated you passes away. If you accept this honor and duty, please take a moment to speak with the person who selected you to have a conversation about this important responsibility.  If you wish to decline this responsibility, please let them know you are unable to accept so they can choose someone else.
                            </p>
                        </td>
                        <tr>
                            {{--
                            <td style="padding:40px 30px; background: #f2f2f2; text-align: center;">
                                <a href="#"><img src="{{url('/')}}/images/acceptBtn.png" alt="accept"></a>
                                <br><br>
                                <a href="#"><img src="{{url('/')}}/images/declineBtn.png" alt="No Thank You, I Respectfully Decline"></a>
                            </td> --}}
                        </tr>
                        <tr>
                            <td style="background: #fff; padding: 45px 0;" align="center">
                                <table cellpadding="0" cellspacing="0" border="0" width="300">
                                    <tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-bottom:1px solid #e3e3e3; padding-bottom: 8px;">
                                               <tr>
                                                    <td style="padding-right: 10px;">
                                                        <img src="{{url('/')}}/images/contactIcon.png" alt="">
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
                                                <img src="{{url('/')}}/images/fd-icon.png" alt="Facebook">
                                            </a>
                                            <a href="https://twitter.com/simplywilled" style=" float: left; padding-top: 10px; margin-left: 26px;">
                                                <img src="{{url('/')}}/images/ttr-icon.png" alt="Twitter">
                                            </a>
                                            <a href="https://www.linkedin.com/company/simplywilled.com" style=" float: left; padding-top: 10px; margin-left: 26px;">
                                                <img src="{{url('/')}}/images/in-icon.png" alt="Linkedin">
                                            </a>
                                            <a href="https://www.instagram.com/simplywilled" style=" float: left; padding-top: 10px; margin-left: 26px;">
                                                <img src="{{url('/')}}/images/gram-icon.png" alt="Instagram">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
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