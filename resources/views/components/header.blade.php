
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-5">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{route('home')}}">Posty</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{request()->path() == 'dashboard' ? 'active' : ''}}" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->path() == 'posts' ? 'active' : ''}}" href="{{route('posts')}}">Posts</a>
          </li>

        </ul>
        <div>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @guest
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Register</a></li>
                @endguest
                @auth
                <li class="nav-item"><a href="#" class="nav-link user-name">{{Auth::User()->name}}</a></li>
                <form action="{{route('logout')}}" method="POST" class="ms-3">
                @csrf
                    <button class="btn butn">Logout</button>
                </form>
                @endauth
            </ul>
        </div>
      </div>
    </div>
  </nav>
