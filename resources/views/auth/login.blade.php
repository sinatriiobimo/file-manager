@extends('layouts.login')

@section('title', 'Login')
@section('name-content')
    <div class="container mt-5">
        <h4 class="m-0">Login Account</h4>
        <p style="font-size: 12px;">Please sign in your account to get access</p>
    </div>
@endsection
@section('content')
<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="eail">Email</label>
            <input type="email" name="email" required class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="nope">

                   @if ($errors->has('email'))
                       <span class="invalid-feedback">
                           <strong>{{$errors->first('email')}}</strong>
                       </span>
                   @endif
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" autocomplete="new-password">

                   @if ($errors->has('password'))
                       <span class="invalid-feedback">
                           <strong>{{$errors->first('password')}}</strong>
                       </span>
                   @endif
        </div>

        <button type="submit" class="btn btn-register btn-block">Login</button>
        <div class="footer mt-3">
        </div>
    </form>
</div>
@endsection