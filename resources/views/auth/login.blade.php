@extends('layouts.master')
@section('title', 'Login')
@section('description', 'This is a description')
@section('keywords', 'These, are, keywords')
@section('content')
<div class="container center half-h">
    <section class="box">
    <h4>Login</h4>
        <form class="login" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" placeholder="Enter E-Mail" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span>
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>
            <input id="password" type="password" placeholder="Enter Password" name="password">
            @if ($errors->has('password'))
                <span>
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
        <button type="submit">
            <i class="fa fa-btn fa-sign-in"></i> Login
        </button>
        <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
        </form>
    </section>
</div>
@endsection
