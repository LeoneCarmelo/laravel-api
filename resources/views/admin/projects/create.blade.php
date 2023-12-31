@extends('admin.dashboard')

@section('mainDash')
@include('admin.partials.validation_errors')
<form action="{{route('admin.projects.store')}}" method="post" class="my-4 d-flex flex-column" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Title" aria-describedby="helpIdtitle" required>
    <small id="helpIdtitle" class="text-muted">Insert a unique title (max 100 characters).</small>
    @error('title')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" id="image" value="{{old('image')}}" class="form-control @error('image') is-invalid @enderror" placeholder="Image" aria-describedby="helpIdimage" required>
    <small id="helpIdimage" class="text-muted">Insert a Image's link.</small>
    @error('image')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" id="description" rows="3" required></textarea>
    <small id="helpIddescription" class="text-muted">Insert description.</small>
    @error('description')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="link_project" class="form-label">Link project</label>
    <input type="text" name="link_project" id="link_project" value="{{old('link_project')}}" class="form-control @error('link_project') is-invalid @enderror" placeholder="" aria-describedby="helpIdlink_project" required>
    <small id="helpIdlink_project" class="text-muted">Insert the link of the project.</small>
    @error('link_project')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="link_website" class="form-label">Link website</label>
    <input type="text" name="link_website" id="link_website" value="{{old('link_website')}}" class="form-control @error('link_website') is-invalid @enderror" placeholder="" aria-describedby="helpIdlink_website" required>
    <small id="helpIdlink_website" class="text-muted">Insert the link of the website.</small>
    @error('link_website')
    <div class="alert alert-danger" role="alert">
      <strong>Error: </strong> {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="type_id" class="form-label">Types</label>
    <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id" required>
      <option value="">Select a type</option>
      @foreach ($types as $type)
      <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
      @endforeach
    </select>
  </div>
  <div class='form-group'>
    <p>Select the technology:</p>
    <div class="d-flex justify-content-between flex-wrap">
      @foreach ($technologies as $technology)
      <div class="form-check @error('technologies') is-invalid @enderror">
        <label class='form-check-label'>
          <input name='technologies[]' type='checkbox' value='{{ $technology->id}}' class='form-check-input' {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
          {{ $technology->name }}
        </label>
      </div>
      @endforeach
    </div>
    @error('technologies')
    <div class='invalid-feedback'>{{ $message}}</div>
    @enderror
  </div>
  <button type="submit" value="Save" class="btn btn-success my-4 w-25 text-uppercase fw-bold align-self-end">Save</button>
</form>
@endsection