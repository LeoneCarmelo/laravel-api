@extends('admin.admin')

@section('content')

<nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            {{-- config('app.name', 'Laravel') --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('/') }}">{{ __('Home') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                        <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item d-flex align-items-center gap-2">
                        <a class="nav-link active {{Route::currentRouteName() === 'admin.dashboard' ? 'text-blue' : 'text-white'}}" aria-current="page" href="{{route('admin.dashboard')}}">
                            <span data-feather="home"></span>
                            <i class="fa-solid fa-circle-dot me-3 {{Route::currentRouteName() === 'admin.dashboard' ? 'text-blue' : 'text-white'}}"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center gap-2">
                        <a class="nav-link {{Route::currentRouteName() === 'admin.projects.index' ? 'text-blue' : 'text-white'}}" href="{{route('admin.projects.index')}}">
                            <span data-feather="file"></span>
                            <i class="fa-solid fa-circle-dot me-3 {{Route::currentRouteName() === 'admin.projects.index' ? 'text-blue' : 'text-white'}}"></i>
                            Projects
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center gap-2">
                        <a class="nav-link {{Route::currentRouteName() === 'admin.types.index' ? 'text-blue' : 'text-white'}}" href="{{route('admin.types.index')}}">
                            <span data-feather="shopping-cart"></span>
                            <i class="fa-solid fa-circle-dot me-3 {{Route::currentRouteName() === 'admin.types.index' ? 'text-blue' : 'text-white'}}"></i>
                            Types
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center gap-2">
                        <a class="nav-link {{Route::currentRouteName() === 'admin.technologies.index' ? 'text-blue' : 'text-white'}}" href="{{route('admin.technologies.index')}}">
                            <span data-feather="shopping-cart"></span>
                            <i class="fa-solid fa-circle-dot me-3 {{Route::currentRouteName() === 'admin.technologies.index' ? 'text-blue' : 'text-white'}}"></i>
                            Technologies
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center gap-2">
                        <a class="nav-link {{Route::currentRouteName() === 'admin.files.index' ? 'text-blue' : 'text-white'}}" href="{{route('admin.files.index')}}">
                            <span data-feather="shopping-cart"></span>
                            <i class="fa-solid fa-circle-dot me-3 {{Route::currentRouteName() === 'admin.files.index' ? 'text-blue' : 'text-white'}}"></i>
                            Files
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @if (Route::currentRouteName() === 'admin.dashboard')
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="dash">
            <div class="container">
                <div class="row row-cols-1 row-cols-xl-3 justify-content-center align-items-center">
                    <div class="col mt-5 p-5">
                        <a class="nav-link {{Route::currentRouteName() === 'admin.projects.index' ? 'text-white' : 'text-dark'}}" href="{{route('admin.projects.index')}}">
                            <div class="dash_card rounded-3">
                                <h2 class=" fw-bold text-uppercase text-center">Projects</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col mt-5 p-5">
                        <a class="nav-link {{Route::currentRouteName() === 'admin.types.index' ? 'text-white' : 'text-dark'}}" href="{{route('admin.types.index')}}">
                            <div class="dash_card rounded-3">
                                <h2 class=" fw-bold text-uppercase text-center">Types</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col mt-5 p-5">
                        <a class="nav-link {{Route::currentRouteName() === 'admin.technologies.index' ? 'text-white' : 'text-dark'}}" href="{{route('admin.technologies.index')}}">
                            <div class="dash_card rounded-3">
                                <h2 class=" fw-bold text-uppercase text-center">Technologies</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
        @else
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            @yield('mainDash')
        </main>
        @endif
    </div>
</div>

@endsection