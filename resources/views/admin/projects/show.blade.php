@extends('admin.dashboard')

@section('mainDash')
<div class="container py-4">
    <div class="row row-cols-1 row-cols-lg-2 mt-2 py-3 rounded-1 px-2">
        <div class="col pb-3">
            <div class="text-center">
                <img class="img-fluid rounded-1" src="{{ asset('storage/' . $project->image)}}" alt="{{$project->title}}">
            </div>
        </div>
        <div class="col">
            <div><strong>Title: </strong>{{$project->title}}</div>
            <div>
                <div class="description h-50 my-2"><strong>Description: </strong>{{$project->description}}</div>
            </div>
            <div>
                <div class="description h-50 my-2">
                    @if ($project->technologies->count() > 0)
                    <strong>Technologies used: </strong>
                    <span>{{$project->technologies->count()}}</span>
                    <ul class="list-unstyled d-flex gap-2">
                        @foreach ($project->technologies as $technology)
                        <li><span class="badge bg-danger">{{ $technology->name }}</span></li>
                        @endforeach
                    </ul>
                    @else
                    <p>No technologies associated.</p>
                    @endif
                </div>
            </div>
            <div class="meta">
                <strong>Type: </strong>
                <span class="badge bg-primary">{{$project->type?->name}}</span>
            </div>
        </div>
    </div>
    @endsection