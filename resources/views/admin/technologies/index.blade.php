@extends('admin.dashboard')

@section('mainDash')
<div class="container pt-3">
    @include('admin.partials.validation_errors')
    @include('admin.partials.session_message')
    <h1 class="text-center fw-wold text-uppercase fw-bold py-4">Technologies</h1>
    <form action="{{route('admin.technologies.store')}}" method="post" enctype="multipart/form-data" class="d-flex  mt-2 mb-5">
        @csrf
        <div class="input-group mb-3 w-25 mx-auto py-3">
            <input type="text" class="form-control bg-transparent border-black" placeholder="Type name of technology" aria-label="Button" name="name" id="name">
        </div>
        <div class="input-group mb-3 w-25 mx-auto py-3">
            <input type="file" class="form-control bg-transparent border-black file" placeholder="Insert link image" aria-label="Button" name="link_img" id="link_img">
        </div>
        <div class="input-group mb-3 w-25 mx-auto py-3">
            <input type="submit" class="form-control bg-dark text-white" aria-label="Button" value="Add">
        </div>
    </form>



    <div class="row row-cols-1 row-col-sm-2 row-cols-md-4">
        @foreach ($technologies as $technology)
        <!-- Modal trigger button -->
        <div class="col d-flex justify-content-center pb-4 ">
            <div class="technologies position-relative">
                <div class="overlay position-absolute bottom-0 left-0 h-100 w-100 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-{{$technology->slug}}">
                        <i class="fa fa-trash fs-1" style="color: #FFFFFF;" aria-hidden="true"></i>
                    </button>
                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modal-{{$technology->slug}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalName-{{$technology->slug}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-name" id="modalName-{{$technology->slug}}">
                                        <i class="fa-solid fa-spinner fa-spin mx-2"></i>
                                        Deleting
                                        <span class="fw-bold">{{$technology->name}}</span>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <img src="{{asset('storage/' . $technology->link_img)}}" alt="{{$technology->name}}" class="img-fluid mb-3" />
                                    <span>Are you sure to delete <strong>{{$technology->name}}</strong>?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img width="180px" src="{{asset('storage/' . $technology->link_img)}}" alt="{{$technology->name}}" class="img-fluid" />
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection