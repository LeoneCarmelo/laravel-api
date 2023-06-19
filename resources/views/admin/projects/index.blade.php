@extends('admin.dashboard')

@section('mainDash')
@include('admin.partials.validation_errors')
<div class="container projects">
    <h1 class="text-center py-3">Projects</h1>
    @include('admin.partials.session_message')
    <a class="btn btn-dark my-2 " href="{{route('admin.projects.create')}}" role="button">Add Project</a>
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover">
            <thead>
                <tr class="projects">
                    <th scope="col">Image</th>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Technologies</th>
                    <th scope="col">Link Project</th>
                    <th scope="col">Link Website</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="projects">
                    <td scope="row" class="img">
                        <img src="{{ asset('storage/' . $project->image)}}" width="120" alt="{{$project->title}}" class="img-fluid me-3">
                    </td>
                    <td scope="row" data-cell="Id:">{{$project->id}}</td>
                    <td scope="row" data-cell="Title:">{{$project->title}}</td>
                    <td scope="row" data-cell="Technologies:">{{$project->technologies->count()}}</td>
                    <td scope="row" data-cell="Link project:"><a class="text-white" href="{{$project->link_project}}">{{$project->link_project}}</a></td>
                    <td scope="row" data-cell="Link website:"><a class="text-white" href="{{$project->link_website}}">{{$project->link_website}}</a></td>
                    <td scope="row" data-cell="Type:">{{$project->type?->name}}</td>
                    <td scope="row" data-cell="Actions:">
                        <div class="actions d-flex align-items-center gap-2">
                            <a href="{{route('admin.projects.show', $project->slug)}}">
                                <i class="fa-regular fa-eye" aria-hidden="true" style="color: #ffffff;"></i>
                            </a>
                            <a href="{{route('admin.projects.edit', $project->slug)}}">
                                <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                            </a>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-{{$project->slug}}">
                            <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                            </button>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal-{{$project->slug}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$project->slug}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-black" id="modalTitle-{{$project->slug}}">Delete {{$project->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-black">
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
    <div class="pagination_tabs d-flex justify-content-center">{!! $projects->links() !!}</div>


</div>

@endsection