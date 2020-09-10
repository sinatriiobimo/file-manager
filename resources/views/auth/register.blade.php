@extends('layouts.login')

@section('title', 'Register')
@section('name-content')
    <div class="container mt-5">
        <h4 class="m-0">Register</h4>
        <p style="font-size: 12px;">Please register your account and follow the easy step</p>
    </div>
@endsection
@section('content')
<div class="container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required 
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">

                   @if ($errors->has('name'))
                       <span class="invalid-feedback">
                           <strong>{{$errors->first('name')}}</strong>
                       </span>
                   @endif
        </div>
    
        <div class="form-group">
            <label for="eail">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required 
                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">

                   @if ($errors->has('email'))
                       <span class="invalid-feedback">
                           <strong>{{$errors->first('email')}}</strong>
                       </span>
                   @endif
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" autocomplete="off" required 
                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

                   @if ($errors->has('password'))
                       <span class="invalid-feedback">
                           <strong>{{$errors->first('password')}}</strong>
                       </span>
                   @endif
        </div>
    
        <div class="form-group">
            <label for="password_confirmation">Re-typed Password</label>
            <input type="password" name="password_confirmation" required class="form-control">
        </div>
    
        <button type="submit" class="btn btn-register btn-block">Register</button>
        <div class="footer mt-3">
            <span><a href="{{route('login')}}">Back</a></span>
        </div>
    </form>
</div>
@endsection