@extends('layouts.master')

@section('title')
Login
@stop

@section('navigation')

@stop

@section('content')
<div class="row">
    <div class="span6">
        <h3>Login</h3>


        @if($errors->count() > 0)
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{ Form::open(array('url' => 'account/login', 'class' => 'form-horizontal')) }}
        <fieldset>

            <div class="control-group">
                <!-- Username -->
                <label class="control-label" for="email">Email</label>

                <div class="controls">
                    <input type="text" id="email" name="email" placeholder="" class="input-xlarge" tabindex="1">
                </div>
            </div>

            <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Password</label>

                <div class="controls">
                    <input type="password" id="password" name="password" placeholder="" class="input-xlarge" tabindex="2">
                    <p class="help-block"><a href="/account/forgot">Forgot Password?</a></p>
                </div>
            </div>

            <div class="control-group">
                <!-- Button -->
                <div class="controls">
                    <button class="btn btn-success">Login</button>
                </div>
            </div>
        </fieldset>
        {{ Form::close() }}
    </div>

</div>
@stop
