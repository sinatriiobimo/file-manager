@extends('layouts.default')

@section('title', 'User List')
@section('content')
<div class="container col-mt-6 justify-content-center">
    <div class="card mr-4 mt-3">
        <div class="card-header">
            <div class=" justify-content-center text-center">
                <strong>User List</strong>
            </div>
            <nav class="navbar justify-content-center mr-1 mt-1">
                <form class="form-inline">
                  <input class="form-control mr-md-4" type="search" name="name" placeholder="by name" aria-label="User Name">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
              </nav>
        </div>
        <div class="card-body">
           <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key=>$user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{ $user->last_sign_in_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{route('admin.edit', $user->id)}}" class="d-inline">
                                <button class="btn btn-dark btn-sm">
                                    <i class='bx bx-reset'></i>
                                </button>
                            </a>
                            <form action="{{route('admin.destroy', $user->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class='bx bxs-trash'></i>
                                </button>
                            </form>
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
        </div>
    </div>
</div>
@endsection