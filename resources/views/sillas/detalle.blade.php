<?php
/** @var App\Models\Silla $silla */
?>

@extends('layouts.app')

@section('title', "Ver Silla")

@section('main')
<section class="container">
<article class="product-content">
    <div class="product-body">
        <div class="image-content">
            <img src="{{ url('img/' . $silla->foto) }}" alt="{{ $silla->nombre }}">
        </div>
        <div class="desc-content">
        <h1><?=$silla->nombre?></h1>
            <p><?=$silla->descripcion?></p>
            <div>
                <ul>
                    <li>Alto: <span><?=$silla->alto?></span></li>
                    <li>Ancho: <span><?=$silla->ancho?></span></li>
                    <li>Profundidad: <span><?=$silla->profundidad?></span></li>
                    <li>Categoria: <span><?=$silla->categoria->categoria?></span></li>
                    <li>Precio: <span>$<?=$silla->precio?></span></li>
                </ul>
            </div>
            <a class="blue-btn float-right" href="<?=url("listasillas");?>">Volver al listado</a>
    </div>

    </div>

    </article>
    @if(Auth::check())
    <div>
        <h1>Comentarios</h1>
        <form class="form-body w50 mgb-75" action="{{ route('agregarcomentario', ['id_producto' => $silla->id, 'id_usuario' => Auth::user()->id_usuario ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="label-input">
		        <label for="comentario">Agregá tu comentario:</label>
		        <textarea class="input-type textareacomm <?php if($errors->has('comentario')) echo 'input-has-error'?>" name="comentario" id="comentario"></textarea>
                    @if($errors->has('comentario'))
		            <div class="error">{{ $errors->first('comentario') }}</div>
                    @endif
                    <input class="blue-btn mgt-25 float-right" type="submit" value="Guardar">
	        </div>
            
        </form>
        <section class="comentarios">       
            @foreach($silla->comentarios as $comentario )
            <article class="comment mgt-25">
                <span class="user">{{$comentario->usuario->email}} dijo:</span> 
                <span class="comentario">{{$comentario->comentario}}</span>
            </article>
            @endforeach
        </section>
 
    </div>
    @endif


</section>

@endsection