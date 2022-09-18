@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Edit Advertisement')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="mt-4">Edit Advertisement</h4>
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

                {{-- ============== Advertisement add form Start ============= --}}

                <form action="{{ url('admin/update-ad/'.$ad->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{$ad->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="call_number">Contact Number</label>
                        <input type="text" name="call_number" class="form-control" id="call_number"
                               placeholder="Enter Contact Number" value="{{$ad->call_number}}">
                    </div>
                    <div class="mb-3">
                        <label for="go_link">Contact Link</label>
                        <input type="text" name="go_link" class="form-control" id="go_link"
                               placeholder="Enter Contact Link" value="{{$ad->go_link}}">
                    </div>
                    <div class="mb-3">
                        <label for="image">
                            <p>Choose Image</p>
                            <img src="{{ asset('uploads/ad/' .$ad->image) }}" width="150px" />
                        </label>
                        <input type="file" name="image" style="display: none" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input class="form-check-input bg-dark" name="status" value="1" type="checkbox"
                               id="flexSwitchCheckDefault"
                            {{$ad->status == 1 ? 'checked' : ''}}>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-dark mx-auto col-12 col-md-3 mb-3">Update Ad</button>
                        <input type="reset" class="btn btn-secondary mx-auto  col-12 col-md-3 mb-3" value="Reset">

                    </div>
                </form>

                {{-- ============== Advertisement add form End ============= --}}


            </div>
        </div>
    </div>

@endsection

