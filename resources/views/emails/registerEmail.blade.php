<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Registration</title>
    </head>
    <body>
        <p>
            Hi, User
        </p>
        <p>
            Thank you for registraion on Simplywilled. you will find your login details below.
        </p>
        <p>
            Email : {{ $user_email }} <br><br>
            Password: {{ $password }}
        </p>
        <p>
           For any queries please send mail : @ <a href="mailto:{{ $email }}"> {{ $email }} </a>
        </p>
    </body>
</html>