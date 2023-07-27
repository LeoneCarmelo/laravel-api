@extends('layouts.app')
@section('content')

<div class="container">
    <h2 class="text-dark my-4 fw-semibold">
        {{ __('My Profile') }}
    </h2>
    <div class="card p-4 mb-4 bg-body shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-body shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-body shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
