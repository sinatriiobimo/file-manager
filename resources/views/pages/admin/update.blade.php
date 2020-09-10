@extends('layouts.default')

@section('title', 'Update Document')
@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <strong>Reset User</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('admin.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" 
                    name="name"
                    value="{{old('name') ? old('name') : $user->name}}"
                    class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="text-muted">{{message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input type="email" 
                    name="email"
                    value="{{old('email') ? old('email') : $user->email}}"
                    class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="text-muted">{{message}}</div>
                    @enderror
                </div>
            
        <input type="submit" class="btn btn-primary btn-sm btn-p" value="Reset User">
        <a href="{{route('admin.index')}}" class="btn btn-sm btn-danger ">Cancel</a>
    </form>
</div>
@endsection