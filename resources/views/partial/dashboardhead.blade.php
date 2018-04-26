
<nav class="navbar navbar-fixed-top navbar-toggleable-sm navbar-inverse bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="flex-row d-flex">
      <a class="navbar-brand mb-1" href="{{ route('dashboard') }}">Great Neighbor</a>
      <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
      <ul class="navbar-nav">
      @if (Auth::check())
        {{-- <li class="nav-item active">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#features">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#myAlert" data-toggle="collapse">Wow</a>
        </li> --}}
        @endif
      </ul>

      <ul class="navbar-nav ml-auto">
      @if (Auth::guest())
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
      @else
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
                <img class="img-circle" src="{{asset('images/profile-img.png')}}">
                {{ Auth::user()->name }}
                <span class="label label-success">{{ Auth::user()->roles->pluck('name')->first() }}</span>
               {{--  <span class="caret"></span> --}}
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="glyphicon glyphicon-log-out"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            {{-- <div class="dropdown-menu" aria-labelledby="profile-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div> --}}
        </li>
        @endif
      </ul>
    </div>
</nav>