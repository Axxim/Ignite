<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    <p>Hey there, it seems you or someone else thought you forgot your password for
        <a href="{{URL::to('/')}}">Ignite</a>. If this is a mistake, just ignore this email. If not, continue on almighty code wizard!</p>

    <p>Anyways, so here's how you can reset your password: </p>

    <ol>
        <li><a href="{{ URL::to('account/reset', array($user->email, $user->getResetPasswordCode())) }}">Visit this page</a></li>
        <li>Pick a new password</li>
        <li>Login using the new password!</li>
    </ol>

    <p>We hope that's pretty simple, if not, let us know!</p>

    <p>Thanks,<br>
        <i>Luke Strickland</i><br>
        Headmaster at Ignite</p>
</div>
</body>
</html>
