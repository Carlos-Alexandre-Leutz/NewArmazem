<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin :: {{ env('APP_NAME') }}</title>
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
</head>
<body>
{{--@yield('content')--}}
<div class="container-fluid" id="wrapper">
  <div class="row">
    <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
      <h1 class="site-title"><a href="/admin"><img src="{{asset('images/logo-admin.png')}}" alt="" style="width: 85%"></a>
      </h1>
      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fas fa-bars"></em></a>
      <ul class="nav nav-pills flex-column sidebar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-external-link-alt"></i> Ver Site
          </a>
        </li>
        <li class="nav-item">
          @php
            $currentUri = Route::current()->uri;
            $active = preg_match('/categoria|produto/', $currentUri) || $currentUri == 'admin';
          @endphp
          <a class="nav-link {{ $active ? 'active' :'' }}" href="{{url('/admin')}}">
            <i class="fab fa-sourcetree"></i> Categorias
          </a>
        </li>
        @php
          $active = preg_match('/banner/', $currentUri);
        @endphp
        <li class="nav-item">
          <a class="nav-link {{ $active ? 'active' :'' }}" href="{{url('/admin/banner')}}">
            <i class="far fa-images"></i> Banner
          </a>
        </li>
      </ul>

      <a href="{{ url('login') }}" class="logout-button"><em class="fas fa-power-off"></em> Sair</a>
    </nav>


    <main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
      <header class="page-header row justify-center">
        <div class="col-md-6 col-lg-8">
          <h1 class="float-left text-center text-md-left">Dashboard</h1>
        </div>
        <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a
            class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <div class="username mt-1">
              <h4 class="mb-1">{{ Auth::user()->name }}</h4>
              <h6 class="text-muted">Perfil Master</h6>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;"
               aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <em class="fa fa-power-off mr-1"></em> Sair
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </div>
        <div class="clear"></div>
      </header>
      @yield('content')
    </main>
  </div>
</div>
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@yield('scripts')
</body>
</html>