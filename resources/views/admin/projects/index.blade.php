@extends('admin.dashboard')

@section('mainDash')
<div class="container">
    <h1 class="text-center py-3">Projects</h1>
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('message')}}</strong>
    </div>
    @endif
    <a class="btn btn-primary my-2 " href="{{route('admin.projects.create')}}" role="button">Add Project</a>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Link Project</th>
                    <th scope="col">Link Website</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="">
                    <td scope="row">{{$project->id}}</td>
                    <td scope="row">{{$project->title}}</td>
                    <td scope="row">{{$project->slug}}</td>
                    <td scope="row">
                        <img src="{{$project->image}}" width="120" alt="{{$project->title}}">
                    </td>
                    <td scope="row">
                        <div id="desc">
                            {{$project->description}}
                        </div>
                    </td>
                    <td scope="row"><a href="{{$project->link_project}}">{{$project->link_project}}</a></td>
                    <td scope="row"><a href="{{$project->link_website}}">{{$project->link_website}}</a></td>
                    <td scope="row">
                        <a href="{{route('admin.projects.show', $project->slug)}}">
                            <i class="fa fa-eye" aria-hidden="true" style="color: #000000;"></i>
                        </a>
                        <a href="{{route('admin.projects.edit', $project->slug)}}">
                        <i class="fa-solid fa-pencil" style="color: #000000;"></i>
                        </a>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-{{$project->slug}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modal-{{$project->slug}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$project->slug}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-{{$project->slug}}">Delete {{$project->title}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <td scope="row">Sorry, no projects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection