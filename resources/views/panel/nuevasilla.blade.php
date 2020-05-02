<?php
/** @var array $errors  */
/** @var array|Categoria[] $categorias */
?>

@extends('layouts.panelbase')

@section('title', "Crear Nueva Silla")

@section('main')
<section class="container form-body">

<div class="box">
<h1>Nuevo producto</h1>
<form class="w50" action="{{ route('nuevasilla') }}" method="post" enctype="multipart/form-data">
	@csrf

    <div class="label-input">
		<label for="nombre">Nombre</label>
		<input class="input-type <?php if($errors->has('nombre')) echo 'input-has-error'?>" type="text" name="nombre" id="nombre"  value="{{ old('nombre') }}">
		@if($errors->has('nombre'))
		<div class="error">{{ $errors->first('nombre') }}</div>
		@endif
	</div>
    <div class="label-input">
		<label for="id_categoria">Categoria</label>
		<select class="input-type" id="id_categoria" name="id_categoria">
			@foreach($categorias as $categoria)
				<option value="{{ $categoria->id_categoria }}">{{ $categoria->categoria }}</option>
			@endforeach
		</select>
		@if($errors->has('id_categoria'))
		<div class="error">{{ $errors->first('id_categoria') }}</div>
		@endif
	</div>
    <div class="label-input">
		<label for="alto">Alto</label>
		<input class="input-type <?php if($errors->has('alto')) echo 'input-has-error'?>" type="number" name="alto" id="alto"  value="{{ old('alto') }}">
		@if($errors->has('alto'))
		<div class="error">{{ $errors->first('alto') }}</div>
		@endif
	</div>
    <div class="label-input">
		<label for="ancho">Ancho</label>
		<input class="input-type <?php if($errors->has('ancho')) echo 'input-has-error'?>" type="number" name="ancho" id="ancho"  value="{{ old('ancho') }}">
		@if($errors->has('ancho'))
		<div class="error">{{ $errors->first('ancho') }}</div>
		@endif
	</div>
    <div class="label-input">
		<label for="profundidad">Profundidad</label>
		<input class="input-type <?php if($errors->has('profundidad')) echo 'input-has-error'?>" type="number" name="profundidad" id="profundidad"  value="{{ old('profundidad') }}">
		@if($errors->has('profundidad'))
		<div class="error">{{ $errors->first('profundidad') }}</div>
		@endif
	</div>
    <div class="label-input">
		<label for="precio">Precio</label>
		<input class="input-type <?php if($errors->has('precio')) echo 'input-has-error'?>" type="number" name="precio" id="precio" value="{{ old('precio') }}">
		@if($errors->has('precio'))
		<div class="error">{{ $errors->first('precio') }}</div>
		@endif
	</div>
	<div class="label-input">
		<label for="foto">Foto</label>
		<input class="input-type <?php if($errors->has('foto')) echo 'input-has-error'?>"  type="file" name="foto" id="foto" value="{{ old('foto') }}">
		@if($errors->has('foto'))
		<div class="error">{{ $errors->first('foto') }}</div>
		@endif
	</div>
    <div class="label-input">
		<label for="descripcion">Descripción</label>
		<textarea class="input-type textareacomm <?php if($errors->has('descripcion')) echo 'input-has-error'?>" name="descripcion" id="descripcion">{{ old('descripcion') }}</textarea>
        @if($errors->has('descripcion'))
		<div class="error">{{ $errors->first('descripcion') }}</div>
		@endif
	</div>
	<div class="label-input">
		<input class="blue-btn" type="submit" value="Guardar" />
	</div>
    

</form>
</div>
</section>

	
@endsection