<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Welcome to Ignite!</h2>

<div>
    <p>In case you forgot, <a href="{{URL::to('/')}}">Ignite</a> is a real time, development environment for quickly
        testing and prototyping code in several different languages. </p>

    <p>Anyways, here's the stuff you need to know to login: </p>

    <ol>
        <li><a href="{{ URL::to('account/validate', array($user->email, $activationCode)) }}">Authorize Your Email</a></li>
        <li>Start Editing!</li>
    </ol>

    <p>We hope that's pretty simple, if not, let us know!</p>

    <p>Thanks,<br>
        <i>Luke Strickland</i><br>
        Headmaster at Ignite</p>
</div>
</body>
</html>
