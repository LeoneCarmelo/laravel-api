@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card p-4 mb-4 bg-conic shadow border-0 mt-5">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-conic shadow border-0">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-conic shadow border-0">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
