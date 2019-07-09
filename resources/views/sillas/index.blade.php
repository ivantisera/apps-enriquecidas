@extends('layouts.app')

@section('title', 'Listado de sillas')

@section('main')
<div id="productos">
    <section id="contenido">
        <div>
            <ul>
            @foreach($sillas as $silla)
            <li>
                <div class="img-dad">
                    <img class="item-img" src="{{ url('img/' . $silla->foto) }}" alt="{{ $silla->nombre }}">
                </div>
                
                <h3><?=$silla->nombre?></h3>
                <p class="item-precio"> Precio: $<?=$silla->precio?></p>
                <a class="item-btnagregar" href="{{ route('sillas.detalle', ['id' => $silla->id]) }}">Ver detalle</a>
            </li>
            @endforeach
            </ul>
        </div>
    </section>
</div>
    

@endsection
