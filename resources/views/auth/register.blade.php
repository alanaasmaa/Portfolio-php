@extends('layouts.master')
@section('title', 'Register')
@section('description', 'This is a description')
@section('keywords', 'These, are, keywords')
@section('content')
<div class="container center half-h">
    <section class="box">
        <h4>Register</h4>
        <form class="login" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Username</label>
                <input id="name" type="text" placeholder="Enter Username" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span>
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
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
                <input id="password" type="password" name="password" placeholder="Enter Password">
                @if ($errors->has('password'))
                    <span>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" placeholder="Password again" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
            </div>
            <button type="submit">
                <i></i> Register
            </button>
        </form>
    </section>
</div>
@endsection
