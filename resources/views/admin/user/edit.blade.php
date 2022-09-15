@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Edit User')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">Edit User
                    <a href="{{url('admin/users')}}" class="btn btn-danger d-flex float-end btn-sm"> Back</a>
                </h4>
            </div>
            <div class="card-body">

                {{--if having errors when submmiting form show showing errorss --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                {{-- ============== user update form Start ============= --}}

                <form method="POST" action="{{url('admin/update-user/' .$user->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 col-md-6">
                        <label for="name" class="col-form-label">Name</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="col-form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $user->email }}" required autocomplete="email">

                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="password" class="col-form-label">Password</label>

                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               >

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="role_as" class="col-form-label">Select Role</label>

                        <select name="role_as" id="role_as" class="form-control">

                            {{-- value 1 = admin && 0 = user --}}
                            <option value="{{$user->role_as}}">{{ $user->role_as == '1' ? 'Admin' : 'User'}}</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <div class="">
                            <button type="submit" class="btn btn-dark">
                                Update User
                            </button>
                        </div>
                    </div>
                </form>

                {{-- ============== user update form End ============= --}}
            </div>
        </div>
    </div>

@endsection
