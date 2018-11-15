<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title --}}
    <title>Blog | @yield('title')</title>
    {{-- Bootstrap Core CSS --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- jQuery UI --}}
    @yield('style')
    {{-- MetisMenu CSS --}}
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    {{-- Custom CSS --}}
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    {{-- Custom Fonts --}}
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    {{-- Admin --}}
    <link href="{{ asset('css/admin-style.css') }}" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
    @auth
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            {{-- Navbar header --}}
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('admin-group-1/dashboard') }}">IT-TALENTS <i class="fa fa-code"></i></a>
            </div>
            {{-- Navbar header --}}
            {{-- Log out form drop down --}}
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- Log out form drop down --}}
            {{-- Sidebar --}}
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('slider.index') }}"><i class="fa fa-photo fa-fw"></i> Slider</a>
                        </li>
                        <li>
                            <a href="{{ route('service.index') }}"><span class="glyphicon glyphicon-tasks"></span> Services</a>
                        </li>
                        <li>
                            <a href="{{ route('profession.index') }}"><i class="fa fa-user"></i>  Profession</a>
                        </li>
                        <li>
                            <a href="{{ route('member.index') }}"><i class="fa fa-group fa-fw"></i> Team</a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}"><i class="fa fa-list-alt fa-fw"></i> Categories</a>
                        </li>
                        <li>
                            <a href="{{ route('project.index') }}"><i class="fa fa-sitemap fa-fw"></i> Projects</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-trash-o fa-fw"></i> All trash<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li >
                                    <a href="{{route('slider.trash')}}">Slider</a>
                                </li>
                                <li>
                                    <a href="{{route('service.trash')}}">Services</a>
                                </li>
                                <li>
                                    <a href="{{route('profession.trash')}}">Profession</a>
                                </li>
                                <li>
                                    <a href="{{route('member.trash')}}">Team</a>
                                </li>
                                <li>
                                    <a href="{{route('category.trash')}}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{route('project.trash')}}">Projects</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Sidebar --}}
        </nav>

        <div id="page-wrapper">
            {{-- Error massage --}}
            @if ($errors->any())
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            {{-- Error massage --}}

            {{-- success massage --}}
            @if(Session::has('status'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            {{Session::get('status')}}
                        </div>
                    </div>
                </div>
            @endif
            {{-- success massage --}}

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        @yield('page-name')
                    </h2>
                </div>
            </div>
            {{-- Content --}}
            @yield('content')
            {{-- Content --}}
        </div>
    @else
        @yield('login-form')
    @endauth
</div>


{{-- jQuery --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
{{-- CKeditor --}}
<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
{{-- jQuery UI --}}
@yield('script')
{{-- Bootstrap Core JavaScript --}}
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{-- Bootstrap filestyle --}}
<script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>
{{-- Metis Menu Plugin JavaScript --}}
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
{{-- Custom Theme JavaScript --}}
<script src="{{ asset('js/sb-admin-2.js') }}"></script>
{{-- Admin script --}}
<script src="{{ asset('js/admin-script.js') }}"></script>
</body>
</html>
