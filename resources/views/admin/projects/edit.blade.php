@extends('admin.dashboard')

@section('mainDash')
<form action="{{route('admin.projects.update', $project->slug)}}" method="post" class="my-4">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" aria-describedby="helpIdtitle" value="{{old('title', $project->title)}}">
    <small id="helpIdtitle" class="text-muted">Edit a unique title (max 100 characters).</small>
    @error('title')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image" aria-describedby="helpIdimage" value="{{old('image', $project->image)}}">
    <small id="helpIdimage" class="text-muted">Edit a Image's link.</small>
    @error('image')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label"></label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{old('description', $project->description)}}</textarea>
    <small id="helpIddescription" class="text-muted">Edit description.</small>
    @error('description')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="type_id" class="form-label">Types</label>
    <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
      <option value>Select a type</option>
      @foreach ($types as $type)
      <option value="{{$type->id}}" {{ $type->id == old('type_id', $project->type?->id) ? 'selected' : ''}} >{{$type->name}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection