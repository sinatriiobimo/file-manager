@extends('layouts.default')

@section('title', 'Reset')
@section('content')
    @if (session()->has('updatePassword'))
      <div class="alert alert-primary" role="alert">
        <strong>SUCCESS: </strong> {{session()->get('updatePassword')}}
      </div>
    @endif

<div class="container col-lg-4 justify-content-center admin-index">
    <form action="{{route('reset.store')}}" method="POST">
      @csrf
        @foreach ($errors->all() as $error)
          <p class="text-danger">{{ $error }}</p>
        @endforeach
      <div class="card">
        <div class="card-header text-muted">
          Reset Password
        </div>
          <div class="card-body">
              <div class="form-group">
                  <label for="password" for="current-password">Current Password</label>
                  <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                </div>
                <div class="form-group">
                  <label for="password">New Password</label>
                  <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                </div>
                <div class="form-group">
                  <label for="password">Confirm New Password</label>
                  <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-primary btn-p">Reset Password</button>
          </div>
      </div>
    </form>
</div>
@endsection