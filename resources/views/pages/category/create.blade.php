@extends('layouts.default')

@section('title', 'Category')
@section('content')
    <div class="container col-lg-6 justify-content-center mt-3">
        <div class="card">
            <div class="card-header">
                <strong>Category File</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category" class="form-control-label">Category</label>
                        <input type="text" name="category" value="{{old('category')}}" class="form-control @error('category') is-invalid @enderror">
                        @error('category')
                            <div class="text-muted">{{message}}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary btn-p btn-block" value="Add">
                    <a href="{{route('document.create')}}" class="btn btn-danger btn-block">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection    
