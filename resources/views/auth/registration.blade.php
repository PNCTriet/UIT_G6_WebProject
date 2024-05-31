@extends('layout')
@section('content')
<div class="container">
    <h1>Sign Up</h1>
    <!-- <div class="form">
        <input type="email" placeholder="Email or phone number">
        <input type="fullname" placeholder="Full name">
        <input type="date" placeholder="Date of birth">
        <input type="password" placeholder="Password">
        <input type="password" placeholder="Re-enter Password">
        <input type="submit" value="Sign Up">
        <input type="checkbox">
        <label>Remember me</label>
        <a href="#">Need help?</a>
    </div> -->
    <form class="form" method="post" action="{{ route('registration.post') }}">
        @csrf

        <input type="text" name="name" placeholder="Enter your Name">
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif


        <input type="text" name="email" placeholder="Enter your email">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

        <input type="text" onclick="(this.type='date')" name="birthday" placeholder="Date of birth">
        @if ($errors->has('birthday'))
        <span class="text-danger">{{ $errors->first('birthday') }}</span>
        @endif

        <input type="password" name="password" placeholder="Password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif

        <input type="password" name="repassword" placeholder="Re-enter Password">
        @if ($errors->has('repassword'))
        <span class="text-danger">{{ $errors->first('repassword') }}</span>
        @endif

        <input type="submit" name="submit" value="Sign Up">

    </form>
    <div class="content">
        <h2>New to Netflix? <a href="login">Sign in now.</a> </h2> <br>
        <h2>This page is protected by Google reCAPTCHA to ensure you're not a bot. Learn more.</h2>
    </div>
</div>
@endsection