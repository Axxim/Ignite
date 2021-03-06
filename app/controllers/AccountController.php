<?php


class AccountController extends BaseController
{

    public function getLogin()
    {
        return View::make('account.login');
    }

    public function postLogin()
    {
        $input = Input::all();

        $rules = array(
            'email'    => 'required|email',
            'password' => 'required'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('account/login')->withErrors($validator);
        }

        try {
            // Set login credentials
            $credentials = array(
                'email'    => $input['email'],
                'password' => $input['password'],
            );

            // Try to authenticate the user
            $user = Sentry::authenticate($credentials, true);
            Event::fire('user.login', array($user));

            return Redirect::to('');
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            echo 'User is not activated.';
        }

// The following is only required if throttle is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            echo 'User is suspended.';
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            echo 'User is banned.';
        }
    }

    public function getRegister()
    {
        return View::make('account.register');
    }

    public function postRegister()
    {
        $input = Input::all();

        $rules = array(
            'username'         => 'required|min:2|max:32|unique:users',
            'email'            => 'required|email|unique:users',
            'password'         => 'required|min:6',
            'password_confirm' => 'required|same:password'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('account/register')->withErrors($validator);
        }

        try {
            $user = Sentry::register(
                array(
                     'username' => mb_strtolower($input['username']),
                     'email'    => $input['email'],
                     'password' => $input['password']
                )
            );
            $activationCode = $user->getActivationCode();

            Event::fire('user.register', array($user, $activationCode));

            return Redirect::to('account/thanks');

        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            echo 'User with this login already exists.';
        }

    }

    public function getThanks()
    {
        return View::make('account.thanks');
    }

    public function getValidate($email, $key)
    {
        try {
            // Find the user using the user id
            $user = Sentry::getUserProvider()->findByLogin($email);

            // Attempt to activate the user
            if ($user->attemptActivation($key)) {
                Sentry::login($user, true);

                return Redirect::to('');
            } else {
                return Redirect::to('account/login');
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
        catch (Cartalyst\SEntry\Users\UserAlreadyActivatedException $e) {
            echo 'User is already activated.';
        }
    }

    public function getForgot()
    {
        return View::make('account.forgot');
    }

    public function postForgot()
    {
        $input = Input::all();

        $rules = array(
            'email' => 'required|email'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to('account/forgot')->withErrors($validator);
        }


        try {
            // Find the user using the user email address
            $user = Sentry::getUserProvider()->findByLogin($input['email']);

            Mail::send(
                'emails.auth.forgot',
                array('user' => $user),
                function ($m) use ($user) {
                    $m->to($user->email)->subject('Forgot Password?');
                }
            );

            return Redirect::to('account/resetting');
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
    }

    public function getResetting()
    {
        return View::make('account.resetting');
    }

    public function getReset($email, $code)
    {
        return View::make('account.reset', array('email' => $email, 'code' => $code));
    }

    public function postReset()
    {
        $input = Input::all();

        $rules = array(
            'email'            => 'required|email',
            'password'         => 'required|min:6',
            'password_confirm' => 'required|same:password',
            'code'             => 'required'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::to(URL::to('account/reset', array($input['email'], $input['code'])))->withErrors(
                $validator
            );
        }

        try {
            // Find the user using the user id
            $user = Sentry::getUserProvider()->findByLogin($input['email']);

            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode($input['code'])) {
                // Attempt to reset the user password
                if ($user->attemptResetPassword($input['code'], $input['password'])) {
                    return Redirect::to('account/login');
                } else {
                    return Redirect::to('account/forgot');
                }
            } else {
                // The provided password reset code is Invalid
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            echo 'User was not found.';
        }
    }

    public function getLogout()
    {
        Sentry::logout();

        return Redirect::to('');
    }

}
