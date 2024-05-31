@extends('layout')
@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors-> any())
            <div class="col-12">
                @foreach ($error->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>  
        @endif
    </div>
    <h1>Reset Password</h1>
    {{-- @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}
        </div>
    @endif --}}
    <form class="form" method="post" action="{{ route('reset.password.post') }}">
        @csrf
        <input type="text" name="token" hidden value="{{ $token }}">
        <input type="email" name="email" placeholder="Email or phone number">
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

        <input type="password" name="password" placeholder="Enter New Password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif

        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif

        <input type="submit" name="submit" class="btn btn-success" value="submit">
        {{-- <div class="form-check-box">
            <div class="">
                <input type="checkbox">
                <label>Remember me</label>
            </div>
            <a href="register">Need help?</a>
        </div> --}}
    </form>

</div>

@endsection