@extends('layouts.default')

@section('title', 'Show')
@section('content')
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header badge badge-dark">
              Uploaded by {{$document->uploader->name}}
            </div>
            <div class="card-body">
              <a href="{{route('search')}}" class="btn btn-danger mt-1 mb-3 justify-content-lg-start">Back</a>
              <h5 class="card-title">{{$document->filename}}</h5>
              <p class="card-text" style="margin-top: -10px;">{!!$document->description!!}</p>
              <iframe src="{{url($document->file)}}"
                    style="width: 600px; height:500px"></iframe>
            </div>
            <div class="card-footer text-muted">
                 <strong>{{Str::upper($document->category->category)}}</strong> <br>
                  {{$document->created_at->diffForHumans()}} 
                </div>
              </div>
    </div>
@endsection