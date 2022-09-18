@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Add Advertisement')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">Add Advertisement</h4>
            </div>
            <div class="card-body">

                {{-- show error when submitting form  --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                {{-- ============== category add form Start ============= --}}

                <form action="{{ url('admin/add-ad') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="mb-3">
                        <label for="call_number">Contact Number</label>
                        <input type="text" name="call_number" class="form-control" id="call_number"
                               placeholder="Enter Contact Number">
                    </div>
                    <div class="mb-3">
                        <label for="go_link">Contact Link</label>
                        <input type="text" name="go_link" class="form-control" id="go_link"
                               placeholder="Enter Contact Link">
                    </div>
                    <div class="mb-3">
                        <label for="image">Choose Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" class="form-check-input bg-dark" id="status" value="1">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark mx-auto col-12 col-md-3 mb-3">Add Category</button>
                        <input type="reset" class="btn btn-secondary mx-auto  col-12 col-md-3 mb-3" value="Reset">

                    </div>
                </form>

                {{-- ============== category add form End ============= --}}

            </div>
        </div>
    </div>

@endsection

