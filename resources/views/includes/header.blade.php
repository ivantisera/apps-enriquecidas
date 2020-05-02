
    <ul>
        <li><a  href="<?=url("home");?>">Home</a></li>
        <li><a  href="<?=url("listasillas");?>">Ver Productos</a></li>

         @if(Auth::check())
              <li class="a-menu">Bienvenido/a {{ Auth::user()->email }} (<a href="{{ route('auth.logout') }}">Cerrar Sesión</a>)</li>
            @if(Auth::user()->is_admin == 1)
            <li><a  class="a-menu" href="{{ route('panel') }}">Panel de administración</a></li>
            @endif
            @else
              <li>
                <a  class="a-menu" href="<?=route("login");?>">Iniciar Sesión</a>
              </li>
              <li>
                <a  class="a-menu" href="<?=route("registro");?>">Registrarse</a>
              </li>
            @endif
           
    </ul>
