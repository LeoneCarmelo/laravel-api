@extends('admin.dashboard')

@section('mainDash')
@if ($errors->any())
<div class="alert alert-danger" role="alert">

  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

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
    <label for="link_project" class="form-label">Link project</label>
    <input type="text" name="link_project" id="link_project" class="form-control @error('link_project') is-invalid @enderror" placeholder="" aria-describedby="helpIdlink_project" value="{{old('link_project', $project->link_project)}}">
    <small id="helpIdlink_project" class="text-muted">Insert the link of the project.</small>
    @error('link_project')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="link_website" class="form-label">Link website</label>
    <input type="text" name="link_website" id="link_website" class="form-control @error('link_website') is-invalid @enderror" placeholder="" aria-describedby="helpIdlink_website"  value="{{old('link_website', $project->link_website)}}">
    <small id="helpIdlink_website" class="text-muted">Insert the link of the website.</small>
    @error('link_website')
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
      <option value="{{$type->id}}" {{ $type->id == old('type_id', $project->type?->id) ? 'selected' : ''}}>{{$type->name}}</option>
      @endforeach
    </select>
  </div>
  <div class='form-group'>
    <p>Select the tecnology:</p>
    @foreach ($technologies as $technology)
    <div class="form-check @error('technologies') is-invalid @enderror">
      <label class='form-check-label'>
        @if($errors->any())
        <!-- 1 (if) -->
        <input name="technologies[]" type="checkbox" value="{{ $technology->id}}" class="form-check-input" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
        @else
        <!-- 2 (else) -->
        <input name='technologies[]' type='checkbox' value='{{ $technology->id }}' class='form-check-input' {{ $project->technologies?->contains($technology) ? 'checked' : '' }}>
        @endif
        {{ $technology->name }}
      </label>
    </div>
    @endforeach
    @error('technologies')
    <div class='invalid-feedback'>{{ $message}}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection