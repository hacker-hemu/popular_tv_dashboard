@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Category')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

        <div class="card mt-4">
            <div class="card-header">
                <h4>View Category
                    <a href="{{url('admin/add-category')}}" class="btn btn-sm btn-dark float-end">Add Category</a>
                </h4>
            </div>
            <div class="card-body m-0 p-0">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show">{{ session('message') }}</div>
                @endif

                {{-- ============== category by loop in card  Start ============= --}}
                <div class="container-fluid px-4">
                    <div class="row">
                        <!-- loop start for getting data -->
                        @foreach($category as $item)
                            <div class="col-xl-3 col-md-6 mt-3">
                                <div class="card bg-dark text-white border-0 shadow">
                                    <div class="card-body"
                                         style="background-image: url('{{ asset('uploads/category/' .$item->image) }}'); background-size: cover; height: 120px"></div>
                                    <div class="card-footer  align-items-center justify-content-between">
                                        <div class="row align-items-center">
                                            <a class=" text-white text-decoration-none text-truncate" href="#"
                                               style="max-width: 35%;" title="{{ $item->name }}">{{ $item->name }}</a>
                                            <span class="text-white text-truncate text-end"
                                                  style="font-size: 12px; max-width: 60%;">{{date('d-M-Y', strtotime($item->created_at))}}</span>
                                        </div>

                                        {{-- line break  --}}
                                        <br>

                                        {{-- edite and delete button icon --}}
                                        <div class="row d-flex text-white">
                                            <a href="" class="col-2 text-white"><i class="fa-solid fa-pen"></i></a>
                                            <a href="" class="col-2 text-white"><i class="fa-solid fa-trash"></i></a>
                                            <div
                                                class="form-check form-switch mb-3 d-flex justify-content-end mx-auto col-8">
                                                <input class="form-check-input " type="checkbox"
                                                       id="flexSwitchCheckDefault"
                                                       {{$item->status == 1 ? 'checked' : ''}} disabled>
                                            </div>
                                            <span class="text-white text-truncate  col-12"
                                                  style="font-size: 12px; max-width: 100%;" title="{{ $item->description }}">{{ $item->description }}</span>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ============== category by loop in card  End ============= --}}

            </div>
        </div>
    </div>

@endsection
