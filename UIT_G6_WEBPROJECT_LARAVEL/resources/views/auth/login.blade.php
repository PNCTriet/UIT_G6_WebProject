@extends('layout')
@section('content')
<div class="container" style=" border-radius: 5px; 
background-color: rgba(1, 1, 1, 0.718); 
padding: 20px;">
    <h1>Sign In</h1>
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}
        </div>
    @endif
    <form class="form" method="post" action="{{ route('login.post') }}">
        @csrf

        <input type="email" name="email" placeholder="Email or phone number">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

        <input type="password" name="password" placeholder="Password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif

        <input type="submit" name="submit" class="btn btn-success" value="Sign in">
        <div class="form-check-box">
            <div class="">
                <input type="checkbox">
                <label>Remember me</label>
            </div>
            <a href="forget-password">Forget password</a>
        </div>
    </form>

    <div class="content">
        <h2>New to Netflix? <a href="register">Sign up now.</a> </h2> <br>
        <h2>This page is protected by Google reCAPTCHA to ensure you're not a bot. Learn more.</h2>
    </div>
</div>
@endsection