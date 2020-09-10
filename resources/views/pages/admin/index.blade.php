@extends('layouts.default')

@section('title', 'Admin Role')
@section('content')
<div class="container col-lg-4 justify-content-center admin-index">
    <div class="card">
        <div class="card-body">
          @if (session()->has('deleteUser'))
            <div class="alert alert-danger" role="alert">
              {{session()->get('deleteUser')}}
            </div>
          @endif
          @if (session()->has('updateUser'))
            <div class="alert alert-success" role="alert">
              {{session()->get('updateUser')}}
            </div>
          @endif
          <a href="{{route('user')}}" class="btn btn-primary btn-p btn-block">List User</a>
          <a href="{{route('register')}}" class="btn btn-success btn-block">Add User</a>
        </div>
    </div>
</div>
@endsection