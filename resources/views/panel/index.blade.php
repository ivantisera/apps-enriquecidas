@extends('layouts.panelbase')

@section('title', 'Panel de administración - Productos')

@section('main')

@if(Session::has('loginError'))
	<div class="error">{{ Session::get('error') }}</div>
@endif
@if(Session::has('message'))
	<div class="info">{{ Session::get('message') }}</div>
@endif
<h2 class="titulo">Listado de productos.</h2>
<p><a class="btns extrabtn" href="{{ route('nuevasilla') }}">Agregar nuevo</a></p>
<table class="prds-table">
	<thead>
		<tr>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Alto</th>
		<th>Ancho</th>
		<th>Profundidad</th>
		<th>Categoría</th>
		<th>Precio</th>
		<th>Editar</th>
		<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>

    @foreach($sillas as $silla)
	<tr>
		<td><?=$silla->nombre?></td>
		<td><?=$silla->descripcion?></td>
		<td><?=$silla->alto?></td>
		<td><?=$silla->ancho?></td>
		<td><?=$silla->profundidad?></td>
		<td><?=$silla->categoria->categoria?></td>
		<td><?=$silla->precio?></td>
		<td>
		@if(!$silla->trashed())
		<a class="btns" href="{{ route('editarsilla', ['id' => $silla->id]) }}">Editar</a></td>
		@endif
		<td>
		@if(!$silla->trashed())
		<form action="{{ route('eliminarsilla', ['id' => $silla->id]) }}" method="post">
            @csrf
            @method('DELETE')
			<input class="btns" type="submit" value="Eliminar">
    	</form>
		@else
		<form action="{{ route('restablecersilla', ['id' => $silla->id]) }}" method="post">
            @csrf
            @method('PATCH')
			<input class="btns" type="submit" value="Restablecer">
    	</form>
		@endif
		</td>
	</tr>
  @endforeach
  </tbody>
</table>

<p><a class="btns extrabtn w-200" href="<?=url("home");?>">Volver al Home</a></p>

@endsection