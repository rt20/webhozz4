<header class="navbar navbar-header navbar-header-fixed">
     <a href="#" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>

     @include('laraboi.partials.navbar')

     <div class="navbar-right">
          @auth
          <a id="navbarSearch" href="" class="search-link"><i data-feather="search"></i></a>
          @include('laraboi.components._header-message')
          @include('laraboi.components._header-notification')
          @include('laraboi.components._header-profile')
          @else
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          @endauth
     </div>

     <div class="navbar-search">
          <div class="navbar-search-header">
               <input type="search" class="form-control" placeholder="Type and hit enter to search...">
               <button class="btn"><i data-feather="search"></i></button>
               <a id="navbarSearchClose" href="" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
          </div>
     </div>
</header>