@extends('partials.header')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
@endsection

@section('content')

    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        {{-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> --}}
        {{ Auth::user()->name }} | {{ Auth::user()->role->type }}
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{ route('home') }}" class="nav_logo">
                    <i class='bx bx-home nav_logo-icon'></i> <span class="nav_logo-name">Home</span>
                </a>
                <div class="nav_list">

                    <a href="{{ route('dashboard') }}" class="nav_link {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                        <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span>
                    </a>

                    <a href="{{ route('projects') }}" class="nav_link {{ (request()->segment(1) == 'projects') ? 'active' : '' }}">
                        <i class='bx bx-book-content nav_icon'></i> <span class="nav_name">Projects</span>
                    </a>

                    <a href="{{ route('archived.projects') }}" class="nav_link {{ (request()->segment(1) == 'archived-projects') ? 'active' : '' }}">
                        <i class='bx bx-archive'></i> <span class="nav_name">Archived projects</span>
                    </a>

                    <a href="{{ route('add.project') }}" class="nav_link {{ (request()->segment(1) == 'add-project') ? 'active' : '' }}">
                        <i class='bx bx-plus nav_icon'></i> <span class="nav_name">Add new project</span>
                    </a>

                    <a href="{{ route('index.settings') }}" class="nav_link {{ (request()->segment(1) == 'settings') ? 'active' : '' }}">
                        <i class='bx bx-cog nav_icon'></i> <span class="nav_name">Settings</span>
                    </a>

                    <a href="{{ route('index.users') }}" class="nav_link {{ (request()->segment(1) == 'users') ? 'active' : '' }}">
                        <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span>
                    </a>

                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}" class="my-0">
                @csrf

                <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">{{ __('Log Out') }}</span>
                </a>
            </form>

        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('partials.messages')
                {{-- @include('partials.errors') --}}
            </div>
        </div>
        @yield('dashboard-content')
    </div>
    <!--Container Main end-->

@endsection

@section('footer')
    @include('partials.footer')
@endsection()
