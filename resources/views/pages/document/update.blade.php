@extends('layouts.default')

@section('title', 'Update Document')
@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <strong>Update File</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('document.update', $document->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="filename" class="form-control-label">File Name</label>
                    <input type="text" 
                    name="filename"
                    value="{{old('filename') ? old('filename') : $document->filename}}"
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
                    {{old('description') ? old('description') : $document->description}}
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
        <input type="submit" class="btn btn-primary btn-sm btn-p" value="Update File">
        <a href="{{route('search')}}" class="btn btn-sm btn-danger ">Cancel</a>
    </form>
</div>
@endsection