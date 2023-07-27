@extends('layouts.app')

@section('content')
<div class="main_register">
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent mt-5 pt-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="mb-4 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control bg-transparent border-0 rounded-0 border-bottom @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control border-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row justify-content-center">
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control bg-transparent border-0 rounded-0 border-bottom" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                </div>
                            </div>
    
                            <div class="mb-4 row mb-0 justify-content-center text-center">
                                <div class="col-md-6">
                                    <button type="submit" class="btn fw-bold w-50 fs-3">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
