@extends('layouts.master')

@section('title')
Register
@stop

@section('navigation')

@stop

@section('content')
<div class="row">
    <div class="span6">
        <h3>Register</h3>


        @if($errors->count() > 0)
        <div class="alert alert-error">
            <ul>
            @foreach($errors->all() as $message)
                <li>{{$message}}</li>
            @endforeach
            </ul>
        </div>
        @endif

        {{ Form::open(array('url' => 'account/register', 'class' => 'form-horizontal')) }}
        <fieldset>
            <p>Ignite is a new way to share, run and save code.</p>

            <div class="control-group">
                <!-- Username -->
                <label class="control-label" for="username">Username</label>

                <div class="controls">
                    <input type="text" id="username" name="username" placeholder="" class="input-xlarge" tabindex="1">

                    <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                </div>
            </div>

            <div class="control-group">
                <!-- E-mail -->
                <label class="control-label" for="email">E-mail</label>

                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="" class="input-xlarge" tabindex="2">

                    <p class="help-block">We won't spam, this if for resetting your password and stuff.</p>
                </div>
            </div>

            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Password</label>

                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="input-xlarge" tabindex="3">

                    <p class="help-block">Password should be at least 6 characters</p>
                </div>
            </div>

            <div class="control-group">
                <!-- Password -->
                <label class="control-label" for="password_confirm">Password (Confirm)</label>

                <div class="controls">
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge" tabindex="4">

                    <p class="help-block">Please confirm your password</p>
                </div>
            </div>

            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success">Register</button>
                </div>
            </div>
        </fieldset>
        {{ Form::close() }}
    </div>

    <div class="span6">
        <h3>Terms of Usage</h3>
    </div>

</div>
@stop
