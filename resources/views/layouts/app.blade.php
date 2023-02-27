<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ config('app.name')}} : @yield('title')</title>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css')}}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/myCSS.css') }}" />
  </head>

  <body>
  {{-- Request::server('HTTP_ACCEPT_LANGUAGE') --}}
  @php $locale = session()->get('locale'); @endphp
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <nav class="navbar navbar-expand-lg navbar-light menuPrinc">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <!-- <a class="navbar-brand logo_h mr-5" href="{{ route('dashboard')}}">  -->
            <div class="avatar">
              @if(!Auth::user())
              <a href="{{ route('login')}}" class="nav-link search" id="search" rel="logout"> 
                <span>@lang('lang.login')</span>
                <img src="{{ asset('img/icons/login.png') }}" alt=""/>
              </a>
              <ul class="nav navbar-nav menu_nav ml-5">
                <div class="elmMenu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('lang', 'en') }}"><i class="flag flag-united-states"></i> En</a> </li>
                  <li class="nav-item"> <a class="nav-link" href="{{route('lang', 'fr')}}"><i class="flag flag-france"></i> Fr</a> </li>
                </div>
              </ul>
                @else
                  <a href="{{ route('dashboard')}}" class="nav-link search" id="search" rel="logout">
                    @if(Auth::user()->id == 215)
                      <img src="{{ asset('img/icons/marcos.JPG') }}" alt=""/>
                    @else
                      <img src="{{ asset('img/icons/avatar.png') }}" alt=""/>
                    @endif
                    <span>@lang('lang.hello') {{Auth::user()->name}} !</span>
                  </a>
            </div>
                <!-- </a>  -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

                <ul class="nav navbar-nav menu_nav ml-auto">
                  <div class="elmMenu">
                      <li class="nav-item"> <a class="nav-link" href="/">@lang('lang.firstPage')</a> </li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('forum.index')}}">@lang('lang.forum')</a> </li>
                      <li class="nav-item"> <a class="nav-link" href="{{ route('depot.index')}}">@lang('lang.directory')</a> </li>
                    </div>
                    @if(session()->get('locale') == 'fr')
                      <li class="nav-item"> <a class="nav-link" href="{{route('lang', 'en') }}"><i class="flag flag-united-states"></i> En</a> </li>
                    @else
                      <li class="nav-item"> <a class="nav-link" href="{{route('lang', 'fr')}}"><i class="flag flag-france"></i> Fr</a> </li>
                    @endif
                    <li class="nav-item">
                       <a href="{{ route('logout')}}" class="nav-link search" id="search" rel="logout">@lang('lang.logout')
                          <img src="{{ asset('img/icons/logout.png') }}" alt="Logout"/>
                       </a>
                  </li>
              </ul>
              @endif
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->
        @yield('content')
  </body>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</html>