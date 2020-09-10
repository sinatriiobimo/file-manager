@extends('layouts.default')

@section('title', 'Document')
@section('content')
<div class="container">
    @if (auth()->user()->email == 'superadmin@gmail.com')
        <a href="{{route('category.create')}}" class="btn btn-dark">Add Category</a>
    @endif
</div>
<div class="container mt-3">
    <div class="row upload-flex">
        <div class="col-8 upload-section">
            <div class="card">
                <div class="card-header">
                    <strong>Upload File</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{route('document.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="filename" class="form-control-label">File Name</label>
                            <input type="text" 
                            name="filename"
                            value="{{old('filename')}}"
                            class="form-control @error('filename') is-invalid @enderror">
                            @error('filename')
                            <div class="text-muted">{{message}}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea name="description" 
                            id="description"
                            class="ckeditor form-control @error('description') is-invalid @enderror">
                            {{old('description')}}
                        </textarea>
                        @error('description')
                        <div class="text-muted">{{message}}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id" class="form-control-label">Category</label>
                        <select name="category_id" 
                        class="form-control @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{Str::upper($category->category)}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-muted">{{message}}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="file" class="form-control-label">File</label>
                    <input type="file" class="form-control-file" name="file" id="file" required
                    accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                </div>
                <input type="submit" class="btn btn-primary btn-p" value="Upload">
            </form>
        </div>
    </div>
</div>

<div class="col-4 download-section">
    
    <div class="card bg-light mb-3">
        <div class="card-header">
            <strong>Show File</strong>
        </div>
        
        <div class="card-body">
            <div class="list-group">
                @foreach ($documents as $document)
                <a href="{{route('document.show', $document->id)}}" class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between mb-2" style="border-bottom: 2px solid white;">
                        <h5 class="mb-1" style="font-size: 15px; font-weight: bold;">{{$document->filename}}</h5>
                    </div>
                    <p class="mb-1">{!!$document->description!!}</p>
                    <small class="mt-2">{{$document->created_at->diffForHumans()}}</small>
                </a>
                @endforeach
            </div>
            <ul class="pagination mt-3 mb-0">
                <li class="page-item">
                    {{$documents->links()}}
                </li>
            </ul>
        </div>
        
    </div>
</div>
</div>
</div>
@endsection