<?php
/** @var App\Models\Silla $silla */
?>

@extends('layouts.app')

@section('title', "Ver Silla")

@section('main')
<section>
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
            <a class="btn-agregar" href="<?=url("listasillas");?>">Volver al listado</a>
    </div>

    </div>

    </article>
    @if(Auth::check())
    <section class="comentarios">
        <h1>Comentarios</h1>
        <form action="{{ route('agregarcomentario', ['id_producto' => $silla->id, 'id_usuario' => Auth::user()->id_usuario ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
		        <label for="comentario">Agregá tu comentario:</label>
		        <textarea class="textareacomm" name="comentario" id="comentario"></textarea>
                    @if($errors->has('comentario'))
		            <div>{{ $errors->first('comentario') }}</div>
		            @endif
	        </div>
            <input class="btn-guardar" type="submit" value="      Guardar        ">
        </form>
        @foreach($silla->comentarios as $comentario )
        <article class="comment">
            <span class="user">{{$comentario->usuario->email}} dijo:</span> 
            <span class="comentario">{{$comentario->comentario}}</span>
        </article>
       @endforeach
    </section>
    @endif


</section>

@endsection