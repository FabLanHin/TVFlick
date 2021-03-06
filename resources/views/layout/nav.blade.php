<section class="navcss">
  <div class="container">
    <header class="personal-header d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 personal-header">
      

      <a href="/home" class="d-flex align-items-left col-md-3 mb-md-0 text-decoration-none nombre-header logoF">
        <img src="{{ asset('img/Logo1.png') }}" width="55" height="50"> TVFlick 
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        @guest

        @else
        <li><a href="{{ route('movies.index') }}" class="nav-link px-2 navItem"><ion-icon name="videocam-outline"></ion-icon> Películas</a></li>
        <li><a href="{{ route('series.index') }}" class="nav-link px-2 navItem"><ion-icon name="tv-outline"></ion-icon> Series</a></li>
        @endguest
      </ul>

      <div class="col-md-3 text-end">
        @guest
          <a href="{{ route('login') }}" class="btn me-2 btnLanding"><ion-icon name="log-in-outline"></ion-icon> Iniciar Sesión</a>
          <a href="{{ route('register') }}" class="btn btnLanding"><ion-icon name="add-circle-outline"></ion-icon> Registro</a>
        @else
        <div class="dropdown">
          <button class="btn btnLanding" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><ion-icon name="people-circle-outline"></ion-icon>
            {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          Cerrar Sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
          </ul>
        </div>
        @endguest
      </div>
    </header>
  </div>
</section>