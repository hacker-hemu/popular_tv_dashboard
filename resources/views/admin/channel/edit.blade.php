@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Edit Channel')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">Edit Channel
                    <a href="{{url('admin/channels')}}" class="btn btn-danger d-flex float-end btn-sm"> Back</a>
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

                <form action="{{ url('admin/update-channel/' .$channel->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="category_id">Choose Category</label>
                        <select class="form-select" name="category_id" id="category_id">
                            @foreach($category as $cateItem)
                                <option
                                    value="{{$cateItem->id}}" {{$channel->category !== null ? $channel->category->id == $cateItem->id ? 'selected' : '' : ''}}>{{$cateItem->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Channel Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$channel->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{$channel->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="video_link_type">Link Type</label>
                        <select class="form-select" name="video_link_type" id="video_link_type">

                            {{--
                            condition for set variable value according to video_link_type
                            1 = Link
                            2 = YouTube Iframe
                            3 = Youtube Link

                             --}}
                            @if($channel->video_link_type == 1)
                                {{$video_link_type = 'Link'}}
                            @elseif($channel->video_link_type == 2)
                                {{$video_link_type = 'YouTube Iframe'}}
                            @elseif($channel->video_link_type == 3)
                                {{$video_link_type = 'Youtube Link'}}
                            @endif

                            <option value="{{$channel->video_link_type}}">{{$video_link_type}}</option>
                            <option value="1">Link</option>
                            <option value="2">YouTube Iframe</option>
                            <option value="3">Youtube Link</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="video_link">Video Link</label>
                        <input type="text" name="video_link" class="form-control" id="video_link"
                               value="{{$channel->video_link}}">
                    </div>
                    <div class="mb-3">
                        <label for="image">
                            <p>Choose Image</p>
                            <img src="{{ asset('uploads/channel/' .$channel->image) }}" width="150px" />
                        </label>
                        {{-- <input id="file-input" style="display: none" type="file" /> --}}
                        <input type="file" name="image" style="display: none" class="form-control" id="image">

                    </div>

                    {{-- check boxes start  --}}
                    <div class="row d-flex mb-3">
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="is_favorite">Favorite</label>
                            <input type="checkbox" name="is_favorite" class="form-check-input bg-dark"
                                   id="is_favorite"
                                   value="1"
                                {{$channel->is_favorite == 1 ? 'checked' : ''}}>
                        </div>
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="is_popular">Popular</label>
                            <input type="checkbox" name="is_popular" class="form-check-input bg-dark"
                                   id="is_popular"
                                   value="1"
                                {{$channel->is_popular == 1 ? 'checked' : ''}}>
                        </div>
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="in_slider">Add to Slider</label>
                            <input type="checkbox" name="in_slider" class="form-check-input bg-dark" id="in_slider"
                                   value="1"
                                {{$channel->in_slider == 1 ? 'checked' : ''}}>
                        </div>
                        <div class="mb-3 col-6 col-lg-2">
                            <label for="status">Status</label>
                            <input class="form-check-input bg-dark" name="status" value="1" type="checkbox"
                                   id="flexSwitchCheckDefault"
                                {{$channel->status == 1 ? 'checked' : ''}}>
                        </div>
                    </div>
                    {{-- check boxes end  --}}

                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark mx-auto col-12 col-md-3 mb-3">Update Channel</button>
                        <a href="{{url('admin/channels')}}" class="btn btn-secondary mx-auto  col-12 col-md-3 mb-3">Cancel </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

