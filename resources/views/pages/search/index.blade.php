@extends('layouts.default')

@section('title', 'Search')
@section('content')

<div class="card mr-4 mt-3">
    <div class="card-header">
        <div class=" justify-content-center text-center">
            <strong>Search Document</strong>
        </div>
        <nav class="navbar justify-content-center mr-1 mt-1">
            <form class="form-inline" action="{{url()->current()}}" method="GET">
                <select value="{{Request::get('category_id')}}" name="category_id" id="category_id" class="form-control mr-md-4">
                    <option value="">All</option>
                    @foreach ($documentByCategory as $key=>$document)
                    @switch($key)
                    @case(1)
                    <option value="{{$key}}">PDF</option>
                    @break
                    @case(2)
                    <option value="{{$key}}">DOC</option>
                    @break
                    @case(3)
                    <option value="{{$key}}">XLSX</option>
                    @break
                    @case(4)
                    <option value="{{$key}}">PPT</option>
                    @break
                    @case(5)
                    <option value="{{$key}}">JPG</option>
                    @break
                    @case(6)
                    <option value="{{$key}}">PNG</option>
                    @break
                    @default
                    <option value="">All</option>
                    @endswitch
                    
                    @endforeach
                </select>
                <input class="form-control mr-md-4" value="{{Request::get('year')}}" type="search" name="year" placeholder="by year" aria-label="Year"> 
                <input class="form-control mr-md-4" value="{{Request::get('filename')}}" type="search" name="filename" placeholder="by filename" aria-label="File Name">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
    </div>
    <div class="card-body">
        @if (session()->has('status'))
        <div class="alert alert-success" role="alert">
            {{session()->get('status')}}
        </div>
        @endif
        
        @if (session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            {{session()->get('delete')}}
        </div>
        @endif

        @if (session()->has('download'))
        <div class="alert alert-info" role="alert">
            {{session()->get('download')}}
        </div>
        @endif
        @if (session()->has('update'))
        <div class="alert alert-primary" role="alert">
            {{session()->get('update')}}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table" id="sortingColumn">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>File Name</th>
                        <th>Submit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $key=>$document)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$document->created_at->year}}</td>
                        <td>{{Str::upper($document->category->category)}}</td>
                        <td>
                            <a href="{{route('document.show', $document->id)}}">{{$document->filename}}</a>
                        </td>
                        <td>

                            @can('update', $document)
                            <a href="{{route('document.edit', $document->id)}}" class="d-inline">
                                <button class="btn btn-dark btn-sm">
                                    <i class='bx bxs-pencil'></i>
                                </button>
                            </a>
                            @endcan

                            <form action="{{route('document.download', $document->id)}}" method="get" class="d-inline">
                                @csrf
                                <button class="btn btn-primary btn-p btn-sm">
                                    <i class='bx bxs-download' ></i>
                                </button>
                            </form>

                            @can('delete', $document)
                            <form action="{{route('document.destroy', $document->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class='bx bxs-trash' ></i>
                                </button>
                            </form>
                            @endcan

                            

                        </td>
                        <tr>
                            @empty
                            <td colspan="6" class="text-center p-5">
                                Data Not Found
                            </td>
                        </tr>
                        @endforelse
                    </tr>
                </tbody>
            </table>
            {{-- <ul class="pagination">
                <li class="page-item">
                    {{ $documents->links() }}
                </li>
            </ul> --}}
        </div>
    </div>
    
    @endsection