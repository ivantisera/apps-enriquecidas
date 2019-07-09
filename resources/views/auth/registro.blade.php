@extends('layouts.noheader')

@section('title', 'Registrarse')

@section('main')


<section class="form-body">

<div class="box">
<h1>Registro</h1>
<p>Completá con tus datos y registrate</p>
@if(Session::has('regError'))
	<div class="error">{{ Session::get('error') }}</div>
@endif
@if(Session::has('message'))
	<div class="info">{{ Session::get('message') }}</div>
@endif

<form action="{{ route('auth.doRegistro') }}" method="post">
	@csrf
	<div>
		<label for="email">E-mail</label>
		<input class="email" type="email" name="email" value="{{ old('email') }}" class="form-control">
		@if($errors->has('email'))
				<div class="error">{{ $errors->first('email') }}</div>
				@endif
	</div>
	<div>
		<label for="password">Contraseña</label>
		<input class="email" type="password" name="password" class="form-control">
		@if($errors->has('password'))
				<div class="error">{{ $errors->first('password') }}</div>
				@endif
	</div>
	<button class="btn">Registrate</button>
</form>

</div>
</section>


@endsection
