<div class="dropdown dropdown-profile">
     <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
          <div class="avatar avatar-sm">
               @if(auth()->user()->getFirstMedia())
               <img src="{{ asset('images'. auth()->user()->getFirstMediaUrl()) }}" alt="" class="rounded-circle" style="height: 35px; width: 35px">
               @else
               <img src="https://via.placeholder.com/500" class="rounded-circle" alt="">
               @endif
          </div>
     </a>
     <div class="dropdown-menu dropdown-menu-right tx-13">
          <div class="avatar avatar-lg mg-b-15">
               @if(auth()->user()->getFirstMedia())
               <img src="{{ asset('images'. auth()->user()->getFirstMediaUrl()) }}" alt="" class="rounded-circle" style="height: 35px; width: 35px">
               @else
               <img src="https://via.placeholder.com/500" class="rounded-circle" alt="">
               @endif
          </div>
          <h6 class="tx-semibold mg-b-5">{{ strtoupper(auth()->user()->name) }}</h6>
          <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>

          @if(auth()->user()->isImpersonating() || session()->has('impersonate'))
          <a href="{{ route('impersonate.stop') }}" class="dropdown-item">
               <i data-feather="scissors"></i> Stop Impersonate
          </a>
          @endif
          <a href="#" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
          <a href="#" class="dropdown-item"><i data-feather="user"></i> View Profile</a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i data-feather="log-out"></i> {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
          </form>
     </div>
</div>