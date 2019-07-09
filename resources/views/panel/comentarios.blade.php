@extends('layouts.panelbase')

@section('title', 'Panel de administración - Comentarios')

@section('main')

@if(Session::has('error'))
	<div class="error">{{ Session::get('error') }}</div>
@endif
@if(Session::has('message'))
	<div class="error">{{ Session::get('message') }}</div>
@endif
<h2 class="titulo">Listado de comentarios.</h2>
<table>
	<thead>
		<tr>
		<th>Producto</th>
		<th>Usuario</th>
		<th>Comentario</th>
		<th>Fecha</th>
		<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>

    @foreach($comentarios as $comentario)
    @if(!empty($comentario->producto))
	<tr>
    <td><?=$comentario->producto->nombre?></td>
    <td><?=$comentario->usuario->email ?></td>
    <td><?=$comentario->comentario ?></td>
    <td><?=$comentario->created_at ?></td>
    <td>
		<form action="{{ route('eliminarcomentario', ['id' => $comentario->id]) }}" method="post">
            @csrf
            @method('DELETE')
			<input class="btns extrabtn" type="submit" value="Eliminar">
    	</form>
    </td>
    @endif
	@endforeach
  </tbody>
</table>
@endsection