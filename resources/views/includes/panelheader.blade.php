
    <ul>

        <li><a class="a-menu"  href="<?=url("listasillas");?>">Volver al home</a></li>
        <li>Bienvenide {{ Auth::user()->email }} (<a class="a-menu" href="{{ route('auth.logout') }}">Cerrar Sesión</a>)</li>
        <li><a class="a-menu" href="{{ route('panel') }}">Productos</a></li>
        <li><a class="a-menu" href="{{ route('panelcomentarios') }}">Comentarios</a></li>
           
    </ul>

