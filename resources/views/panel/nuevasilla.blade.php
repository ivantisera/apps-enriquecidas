<?php
/** @var array $errors  */
/** @var array|Categoria[] $categorias */
?>

@extends('layouts.panelbase')

@section('title', "Crear Nueva Silla")

@section('main')
<section class="form-body">

<div class="box">
<h1>Nuevo producto</h1>
<form action="{{ route('nuevasilla') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
		<label for="nombre">Nombre</label>
		<input class="email" type="text" name="nombre" id="nombre"  value="{{ old('nombre') }}">
		@if($errors->has('nombre'))
		<div class="error">{{ $errors->first('nombre') }}</div>
		@endif
	</div>
    <div>
		<label for="id_categoria">Categoria</label>
		<select class="email" id="id_categoria" name="id_categoria">
			@foreach($categorias as $categoria)
				<option value="{{ $categoria->id_categoria }}">{{ $categoria->categoria }}</option>
			@endforeach
		</select>
		@if($errors->has('id_categoria'))
		<div>{{ $errors->first('id_categoria') }}</div>
		@endif
	</div>
    <div>
		<label for="alto">Alto</label>
		<input class="email" type="number" name="alto" id="alto"  value="{{ old('alto') }}">
		@if($errors->has('alto'))
		<div>{{ $errors->first('alto') }}</div>
		@endif
	</div>
    <div>
		<label for="ancho">Ancho</label>
		<input class="email" type="number" name="ancho" id="ancho"  value="{{ old('ancho') }}">
		@if($errors->has('ancho'))
		<div>{{ $errors->first('ancho') }}</div>
		@endif
	</div>
    <div>
		<label for="profundidad">Profundidad</label>
		<input class="email" type="number" name="profundidad" id="profundidad"  value="{{ old('profundidad') }}">
		@if($errors->has('profundidad'))
		<div>{{ $errors->first('profundidad') }}</div>
		@endif
	</div>
    <div>
		<label for="precio">Precio</label>
		<input class="email" type="number" name="precio" id="precio" value="{{ old('precio') }}">
		@if($errors->has('precio'))
		<div>{{ $errors->first('precio') }}</div>
		@endif
	</div>
	<div>
		<label for="foto">Foto</label>
		<input class="email"  type="file" name="foto" id="foto" value="{{ old('foto') }}">
	</div>
    <div>
		<label for="descripcion">Descripción</label>
		<textarea class="email textareacomm" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
        @if($errors->has('descripcion'))
		<div>{{ $errors->first('descripcion') }}</div>
		@endif
	</div>
    <input class="btn" type="submit" value="Guardar">

</form>
</div>
</section>

	
@endsection