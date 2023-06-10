@extends('admin.dashboard')

@section('mainDash')
<div class="container py-5">
    @include('admin.partials.validation_errors')
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col p-2">
            <form action="{{route('admin.types.store')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full Stack" aria-label="Button" name="name" id="name">
                    <button class="btn btn-outline-secondary" type="submit">Add</button>
                </div>
            </form>
        </div>
        <div class="col">
            <div class="table-responsive-md">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Projects Count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                        <tr class="">
                            <td scope="row">{{$type->id}}</td>
                            <td>{{$type->name}}</td>
                            <td>{{$type->slug}}</td>
                            <td>
                                <span class="badge bg-dark">{{ $type->projects->count()}}</span>
                            </td>
                            <td>
                                <form action="{{route('admin.types.destroy', $type)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="">
                            <td scope="row"> 👈 Add your first type </td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
</div>
</div>
@endsection