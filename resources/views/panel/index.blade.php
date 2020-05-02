@extends('layouts.panelbase')

@section('title', 'Panel de administración - Productos')

@section('main')

@if(Session::has('loginError'))
	<div class="error">{{ Session::get('error') }}</div>
@endif

<section class="container">


<h2>Listado de productos.</h2>
@if(Session::has('message'))
	<div class="info">{{ Session::get('message') }}</div>
@endif
<div class="float-right">
<a class="white-btn" href="<?=url("home");?>">Volver al Home</a>
<a class="blue-btn" href="{{ route('nuevasilla') }}">Agregar nuevo</a>
</div>

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
		<th></th>
		<th></th>
		</tr>
	</thead>
	<tbody>

    @foreach($sillas as $silla)
	<tr>
		<td><?=$silla->nombre?></td>
		<td><?= substr($silla->descripcion,0,50)?>...</td>
		<td><?=$silla->alto?></td>
		<td><?=$silla->ancho?></td>
		<td><?=$silla->profundidad?></td>
		<td><?=$silla->categoria->categoria?></td>
		<td><?=$silla->precio?></td>
		<td>
		@if(!$silla->trashed())
		<a class="white-btn" href="{{ route('editarsilla', ['id' => $silla->id]) }}">Editar</a></td>
		@endif
		<td>
		@if(!$silla->trashed())
		<form action="{{ route('eliminarsilla', ['id' => $silla->id]) }}" method="post">
            @csrf
            @method('DELETE')
			<input class="blue-btn" type="submit" value="Eliminar">
    	</form>
		@else
		<form action="{{ route('restablecersilla', ['id' => $silla->id]) }}" method="post">
            @csrf
            @method('PATCH')
			<input class="white-btn" type="submit" value="Restablecer">
    	</form>
		@endif
		</td>
	</tr>
  @endforeach
  </tbody>
</table>

</section>

@endsection