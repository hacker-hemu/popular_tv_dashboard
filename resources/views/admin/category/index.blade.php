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
                            <div class="col-xl-3 col-md-6 mt-3 {{$item->status == 1 ? '' : 'opacity-75'}}">
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
                                            {{-- edit button --}}
                                            <a href="{{url('admin/edit-category/'.$item->id)}}"
                                               class="col-2 text-white"><i class="fa-solid fa-pen"></i>
                                            </a>

                                            {{-- Delete button --}}
                                            <span type="button" class="text-white col-2" data-bs-toggle="modal"
                                                  data-bs-target="#deleteCategory{{$item->id}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </span>

                                            {{-- <a href="{{url('admin/delete-category/'.$item->id)}}" --}}
                                            {{--    class="col-2 text-white"><i class="fa-solid fa-trash"></i> --}}
                                            {{-- </a> --}}
                                            <div
                                                class="form-check form-switch mb-3 d-flex justify-content-end mx-auto col-8">
                                                <input class="form-check-input " type="checkbox"
                                                       id="flexSwitchCheckDefault"
                                                       {{$item->status == 1 ? 'checked' : ''}} disabled>
                                            </div>
                                            <span class="text-white text-truncate  col-12"
                                                  style="font-size: 12px; max-width: 100%;"
                                                  title="{{ $item->description }}">{{ $item->description }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- delete data with confirmation --}}
                            <!-- Category Delete Modal -->
                            <div class="modal fade" id="deleteCategory{{$item->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Want To Delete {{$item->name}} Category
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a href="{{url('admin/delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
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
