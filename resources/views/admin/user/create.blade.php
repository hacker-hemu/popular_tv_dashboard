@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Add User')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Add User</h4>
            </div>
            <div class="card-body m-0 p-0">

                {{-- show error when submitting form  --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                {{-- ============== user add form Start ============= --}}

                <form method="POST" action="{{url('admin/add-user')}}">
                    @csrf

                    <div class="mb-3 col-md-6">
                        <label for="name" class="col-form-label">Name</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email" class="col-form-label">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">

                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="password" class="col-form-label">Password</label>

                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

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
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="row mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-dark">
                                Add User
                            </button>
                        </div>
                    </div>
                </form>

                {{-- ============== user add form End ============= --}}


            </div>
        </div>
    </div>

@endsection
