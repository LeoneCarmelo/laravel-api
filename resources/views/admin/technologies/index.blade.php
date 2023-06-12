@extends('admin.dashboard')

@section('mainDash')
<div class="container pt-3">
    @include('admin.partials.validation_errors')
    @include('admin.partials.session_message')
    <h1 class="text-center fw-wold text-uppercase fw-semibold py-4">Technologies</h1>
    <form action="{{route('admin.technologies.store')}}" method="post" enctype="multipart/form-data" class="d-flex">
        @csrf
        <div class="input-group mb-3 w-25 mx-auto py-3">
            <input type="text" class="form-control" placeholder="Type name of technology" aria-label="Button" name="name" id="name">
        </div>
        <div class="input-group mb-3 w-25 mx-auto py-3">
            <input type="file" class="form-control" placeholder="Insert link image" aria-label="Button" name="link_img" id="link_img">
        </div>
        <div class="input-group mb-3 w-25 mx-auto py-3">
            <input type="submit" class="form-control" aria-label="Button">
        </div>
    </form>
    <div class="row row-cols-1 row-col-sm-2 row-cols-md-4">
        @foreach ($technologies as $technology)
        <div class="col d-flex justify-content-center pb-4">
            <img width="180px" src="{{asset('storage/uploads/' . $technology->link_img)}}" alt="{{$technology->name}}" class="img-fluid" />
        </div>
        @endforeach
    </div>
</div>
@endsection