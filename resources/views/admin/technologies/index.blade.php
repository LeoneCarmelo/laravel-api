@extends('admin.dashboard')

@section('mainDash')
<div class="container pt-3">
    <h1 class="text-center fw-wold text-uppercase fw-semibold py-4">Technologies</h1>
    <div class="row row-cols-1 row-col-sm-2 row-cols-md-4">
        @foreach ($technologies as $technology)
        <div class="col d-flex justify-content-center pb-4">
            <img  width="200px" src="{{asset($technology->link_img)}}" alt="{{$technology->name}}" class="img-fluid"/>
        </div>
        @endforeach
    </div>
</div>
@endsection