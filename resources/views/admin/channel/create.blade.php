@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Add Channels')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Add Channel</h4>
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


                    {{-- ============== channel add form Start ============= --}}

                <form action="{{ url('admin/add-channel') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="category_id">Choose Category</label>
                        <select class="form-select" name="category_id" id="category_id">
                            @foreach($category as $cateItem)
                                <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Channel Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="video_link_type">Link Type</label>
                        <select class="form-select" name="video_link_type" id="video_link_type">
                            <option value="1">Link</option>
                            <option value="2">YouTube Iframe</option>
                            <option value="3">Youtube Link</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="video_link">Video Link</label>
                        <input type="text" name="video_link" class="form-control" id="video_link">
                    </div>
                    <div class="mb-3">
                        <label for="image">Choose Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>

                    {{-- check boxes start  --}}
                    <div class="row d-flex mb-3">
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="is_favorite">Favorite</label>
                            <input type="checkbox" name="is_favorite" class="form-check-input bg-dark" id="is_favorite"
                                   value="1">
                        </div>
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="is_popular">Popular</label>
                            <input type="checkbox" name="is_popular" class="form-check-input bg-dark" id="is_popular"
                                   value="1">
                        </div>
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="in_slider">Add to Slider</label>
                            <input type="checkbox" name="in_slider" class="form-check-input bg-dark" id="in_slider"
                                   value="1">
                        </div>
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" class="form-check-input bg-dark" id="status" value="1"
                                   checked>
                        </div>
                    </div>
                    {{-- check boxes end  --}}

                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark mx-auto col-12 col-md-3 mb-3">Add Channel</button>
                        <input type="reset" class="btn btn-secondary mx-auto  col-12 col-md-3 mb-3" value="Reset">
                    </div>
                </form>

                {{-- ============== channel add form End ============= --}}

            </div>
        </div>
    </div>

@endsection
