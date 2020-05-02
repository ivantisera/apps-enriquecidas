@extends('layouts.app')

@section('title', 'Listado de sillas')

@section('main')
<div id="productos">
    <section id="contenido">
        <h1>Todas las sillas</h1>
        <div>
            <ul>
            @foreach($sillas as $silla)
            <li>
                <div class="img-dad">
                    <img class="item-img" src="{{ url('img/' . $silla->foto) }}" alt="{{ $silla->nombre }}">
                </div>
                
                <h3><?=$silla->nombre?></h3>
                <div class="silla-detail-item">
                    <p class="price-detail"> Precio: $<?=$silla->precio?></p>
                    <div class="">
                        <a class="blue-btn" href="{{ route('sillas.detalle', ['id' => $silla->id]) }}">Ver detalle</a>
                    </div>
                </div>
               
            </li>
            @endforeach
            </ul>
        </div>
    </section>
</div>
    

@endsection
