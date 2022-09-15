@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Edit Category')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">Edit Category</h4>
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

                {{-- form start  --}}
                <form action="{{ url('admin/update-category/' .$category->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description"
                               value="{{$category->description}}">
                    </div>
                    <div class="mb-3">
                        <label for="image">
                            <p>Choose Image</p>
                            <img src="{{ asset('uploads/category/' .$category->image) }}" width="150px" />
                        </label>
                        {{-- <input id="file-input" style="display: none" type="file" /> --}}
                        <input type="file" name="image" style="display: none" class="form-control" id="image">

                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input class="form-check-input bg-dark" name="status" value="1" type="checkbox"
                               id="flexSwitchCheckDefault"
                            {{$category->status == 1 ? 'checked' : ''}}>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark mx-auto col-12 col-md-3 mb-3">Update Category</button>
                        <a href="{{url('admin/category')}}" class="btn btn-secondary mx-auto  col-12 col-md-3 mb-3">Cancel</a>

                    </div>
                </form>
                {{-- form end  --}}

            </div>
        </div>
    </div>

@endsection

