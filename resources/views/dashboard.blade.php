@extends('layouts.default')

@section('title', 'Dashboard')
@section('content')
<div class="card mr-5 mt-2">
    <div class="card-header">
        <strong>Dashboard</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="row justify-content-lg-between">
                    <div class="col">
                        <div class="card stat-info">
                            <div class="card-body">
                                <div class="card-info">
                                    <div class="card-icon">
                                        <i class='bx bxs-user iconics'></i>
                                    </div>
                                    <div class="card-content ml-3">
                                        <div class="text-left">
                                            <div class="stat-text">{{$users}}</div>
                                            <div class="stat-heading">Users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="card stat-info">
                            <div class="card-body">
                                <div class="card-info">
                                    <div class="card-icon">
                                        <i class='bx bxs-coin-stack iconics' ></i>
                                    </div>
                                    <div class="card-content ml-3">
                                        <div class="text-left">
                                            <div class="stat-text">{{$files}}</div>
                                            <div class="stat-heading">Files</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container-fluid">
                        @include('includes.carousel')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <strong>File List</strong>
                    </div>
                    <div class="card-body card-block">
                        <ul class="list-group">
                            @foreach ($documents as $key=>$document)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                @switch($key)
                                    @case(1)
                                        <span>PDF</span>
                                        @break
                                    @case(2)
                                        <span>DOC</span>
                                        @break
                                    @case(3)
                                        <span>PPT</span>
                                        @break
                                    @case(4)
                                        <span>JPG</span>
                                        @break
                                    @case(5)
                                        <span>PNG</span>
                                        @break
                                    @default
                                @endswitch
                                <span class="badge badge-primary badge-pill">{{$document->count()}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection