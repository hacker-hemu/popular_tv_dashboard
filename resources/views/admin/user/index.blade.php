@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Users')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>

        <div class="card mt-4">
            <div class="card-header">
                <h4>View Users
                    <a href="{{url('admin/add-user')}}" class="btn btn-sm btn-dark float-end">Add User</a>
                </h4>
            </div>

            <div class="card-body">

                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show">{{ session('message') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$index++}}</th>
                                    <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role_as == '1' ? 'Admin' : 'User'}}</td>
                                <td class="">
                                    <a href="{{url('admin/edit-user/' . $user->id)}}"
                                       class="text-decoration-none text-white text-center me-2">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <span type="button" class="text-white col-2" data-bs-toggle="modal"
                                          data-bs-target="#deleteUser{{$user->id}}">
                                                <i class="fa-solid fa-trash"></i>
                                    </span>
                                </td>
                            </tr>


                            {{-- delete data with confirmation --}}
                            <!-- User Delete Modal -->
                            <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Want To Delete "{{$user->name}}" User
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a href="{{url('admin/delete-user/'.$user->id)}}"
                                               class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>

                    {{-- add pagination s --}}
{{--                    {!! $users->links() !!}--}}
                </div>
            </div>

        </div>
    </div>

@endsection
