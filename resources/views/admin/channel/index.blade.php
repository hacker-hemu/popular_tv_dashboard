@extends('layouts.master')

{{-- add title --}}
@section('title', 'Popular Tv || Channels')

@section('content')

    {{--design part start--}}
    <div class="container-fluid px-4">
        <h1 class="mt-4">Channels</h1>

        <div class="card mt-4">
            <div class="card-header">
                <h4>View Channels
                    <a href="{{url('admin/add-channel')}}" class="btn btn-sm btn-dark float-end">Add Channel</a>
                </h4>
            </div>
            <div class="card-body m-0 p-0">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show">{{ session('message') }}</div>
                @endif

                {{-- ============== channels by loop in card  Start ============= --}}
                <div class="container-fluid px-4">
                    <div class="row">
                        <!-- loop start for getting data -->
                        @foreach($channel as $item)
                            <div class="col-xl-3 col-md-6 mt-3 {{$item->status == 1 ? '' : 'opacity-75'}}">
                                <div class="card bg-dark text-white border-0 shadow">
                                    <div class="card-header">
                                            <span class="text-white text-truncate  col-11"
                                                  style="max-width: 100%;"
                                                  title="{{ $item->name }}">{{ $item->name }}</span>

                                        <div class="col-1 float-end justify-content-around">
                                            {{-- add to favorite --}}
                                            <span
                                                class="col-2 fs-6 {{$item->is_favorite == 1 ? 'text-danger' : 'text-white'}}"><i
                                                    class="fa-solid fa-heart"></i></span>
                                        </div>
                                    </div>
                                    <div class="card-body"
                                         style="background-image: url('{{ asset('uploads/channel/' .$item->image) }}'); background-size: cover; height: 120px"></div>
                                    <div class="card-footer  align-items-center justify-content-between">
                                        <div class="row align-items-center">
                                                <span class="text-white text-truncate  col-11 mb-2"
                                                      style="font-size: 12px; max-width: 60%;"
                                                      title="{{ $item->title }}">{{ $item->title }}
                                                </span>
                                            <span class="text-white text-truncate  col-11 text-end mb-2"
                                                  style="font-size: 12px; max-width: 40%;"
                                                  title="{{ $item->user->name }}">{{ 'by ' . $item->user->name }}
                                                </span>

                                             <span class="text-white text-truncate"
                                                   style="font-size: 12px; max-width: 50%;">{{ $item->category !== null ? $item->category->name : 'Deleted'}}
                                             </span>

                                            {{-- <span class="text-white text-truncate" --}}
                                            {{--       style="font-size: 12px; max-width: 50%;">{{$item->category !== null ? $item->category->name : 'Deleted'}} --}}
                                            {{-- </span> --}}
                                            <span
                                                class="text-white text-truncate text-end"
                                                style="font-size: 12px; max-width: 50%;">{{date('d-M-Y', strtotime($item->created_at))}}
                                            </span>
                                        </div>

                                        {{-- line break  --}}
                                        <br>

                                        {{-- total view and total likes of this channel --}}
                                        <div class="row text-white">

                                            {{-- total views --}}
                                            <span
                                                class="col-6 text-white text-decoration-none d-flex align-items-center">
                                                <i class="fa-solid fa-eye"></i>
                                            </span>
                                            <span class="col-6 text-end ">{{$item->view}}</span>

                                            {{-- total likes --}}
                                            <span class="col-6 text-white ">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </span>
                                            <span class="col-6 text-end ">{{$item->like}}</span>
                                        </div>


                                        {{-- line break  --}}
                                        <br>

                                        {{-- edite and delete button icon --}}
                                        <div class="row d-flex text-white">
                                            {{-- edit button --}}
                                            <a href="{{url('admin/edit-channel/'.$item->id)}}" class="col-2 text-white"><i
                                                    class="fa-solid fa-pen"></i>
                                            </a>

                                            <span type="button" class="text-white col-2" data-bs-toggle="modal"
                                                  data-bs-target="#deleteChannel{{$item->id}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </span>
                                            <div
                                                class="form-check form-switch d-flex justify-content-end mx-auto col-8">
                                                <input class="form-check-input " type="checkbox"
                                                       id="flexSwitchCheckDefault"
                                                       {{$item->status == 1 ? 'checked' : ''}} disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- delete data with confirmation --}}
                            <!-- Channel Delete Modal -->
                            <div class="modal fade" id="deleteChannel{{$item->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Channel</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Want To Delete "{{$item->name}}" Channel
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a href="{{url('admin/delete-channel/'.$item->id)}}"
                                               class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    {{-- ============== channels by loop in card  End ============= --}}


                </div>
            </div>
        </div>

@endsection
