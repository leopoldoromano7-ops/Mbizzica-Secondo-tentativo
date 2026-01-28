<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid px-5">
    <a class="navbar-brand" href="#">Mbizzica</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pastes.index') }}">Paste</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('pastes.create') }}">Create a Paste</a>
        </li>

        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('settings.two-factor') }}">Impostazioni</a></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto, Utente
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Sign in</a></li>
            </ul>
          </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>
