<?php

class UserHandler
{

    public function onRegister($data)
    {
        Mail::send('emails.auth.register', array('user' => $data), function($m) use($data)
            {
                $m->to($data->email)->subject('Welcome to Ignite!');
            });
    }

}
