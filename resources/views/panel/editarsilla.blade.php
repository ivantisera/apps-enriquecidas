<?php
/** @var array $errors  */
/** @var array|Categoria[] $categorias */
/** @var \App\Models\Silla $silla */
?>

@extends('layouts.noheader')

@section('title', "Editar Silla")

@section('main')
<section class="form-body">

<div class="box editar">
<h1>Editar Silla {{$silla->nombre}}</h1>
<form action="{{ route('editarsilla', ['id' => $silla->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
	@method('PUT')

    <div>
		<label for="nombre">Nombre</label>
		<input class="email" type="text" name="nombre" id="nombre"  value="{{ old('nombre', $silla->nombre) }}">
		@if($errors->has('nombre'))
		<div class="error">{{ $errors->first('nombre') }}</div>
		@endif
	</div>
    <div>
		<label for="id_categoria">Categoria</label>
		<select class="email" id="id_categoria" name="id_categoria">
			@foreach($categorias as $categoria)
				<option value="{{ $categoria->id_categoria }}"
				@if(old('id_categoria', $silla->id_categoria) == $categoria->id_categoria)
						selected
					@endif
					>{{ $categoria->categoria }}</option>
			@endforeach
		</select>
		@if($errors->has('id_categoria'))
		<div class="error">{{ $errors->first('id_categoria') }}</div>
		@endif
	</div>
    <div>
		<label for="alto">Alto</label>
		<input class="email" type="number" name="alto" id="alto"  value="{{ old('alto', $silla->alto) }}">
		@if($errors->has('alto'))
		<div class="error">{{ $errors->first('alto') }}</div>
		@endif
	</div>
    <div>
		<label for="ancho">Ancho</label>
		<input class="email" type="number" name="ancho" id="ancho"  value="{{ old('ancho', $silla->ancho )}}">
		@if($errors->has('ancho'))
		<div class="error">{{ $errors->first('ancho') }}</div>
		@endif
	</div>
    <div>
		<label for="profundidad">Profundidad</label>
		<input class="email" type="number" name="profundidad" id="profundidad"  value="{{ old('profundidad', $silla->profundidad) }}">
		@if($errors->has('profundidad'))
		<div class="error">{{ $errors->first('profundidad') }}</div>
		@endif
	</div>
    <div>
		<label for="precio">Precio</label>
		<input class="email" type="number" name="precio" id="precio" value="{{ old('precio', $silla->precio) }}">
		@if($errors->has('precio'))
		<div class="error">{{ $errors->first('precio') }}</div>
		@endif
	</div>
	<div>
		<img src="{{ url('img/' . $silla->foto) }}" alt="{{ $silla->nombre }}">
		<label for="foto">Foto</label>
		<input type="file" name="foto" id="foto">
	</div>
    <div>
		<label for="descripcion">Descripciómn</label>
		<textarea class="email textareacomm"  name="descripcion" id="descripcion">{{ old('descripcion', $silla->descripcion) }}</textarea>
        @if($errors->has('descripcion'))
		<div class="error">{{ $errors->first('descripcion') }}</div>
		@endif
	</div>
    <input class="btn" type="submit" value="Guardar edición">

</form>
</div>
</section>


@endsection
