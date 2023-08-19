@extends('admin.dashboard')

@section('mainDash')
<div class="container">
    <div class="py-3">
        @include('admin.partials.validation_errors')
    </div>
    @include('admin.partials.session_message')
    <div class="d-flex">
        <form action="{{route('admin.files.store')}}" method="post" enctype="multipart/form-data" class="w-50">
            @csrf
            <div class="d-flex align-items-center gap-5">
                <h3 class="text-left py-2 d-inline-block">Upload your file</h3>
                <div>
                    <button class="btn btn-outline-dark fw-bold" type="submit">Add</button>
                </div>
            </div>
            <div class="mb-3 w-50">
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="" aria-describedby="helpId">
                @error('name')
                <div class="alert alert-danger py-3" role="alert">
                    <strong>Error: </strong> {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3 w-50">
                <input type="file" name="file" id="file" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </form>
        <div class="table-responsive w-50">
            <h3 class="text-center py-2">Files</h3>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">View</th>
                        <th scope="col">Download</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($files as $file)
                    <tr class="">
                        <td scope="row">{{$file->name}}</td>
                        <td scope="row"><a class="text-white text-decoration-none" href="{{ asset('storage/' . $file->file) }}" target="_blank">View</a></td>
                        <td scope="row"><a class="text-white text-decoration-none" href="{{ route('admin.download', $file->id) }}">Download</a></td>
                        <td>
                            <!-- Modal trigger button -->
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modal-{{$file->file}}">
                                <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                            </button>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal-{{$file->file}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$file->file}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-black" id="modalTitle-{{$file->file}}">Delete {{$file->name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-black">
                                            <h6 class="fw-bold">Are you sure?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('admin.files.destroy', $file->name)}}" method="post">
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
                    <td>No files found!</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection