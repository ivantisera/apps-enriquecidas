@extends('layouts.app')

@section('title', 'Registrarse')

@section('main')


<section class="container form-body">

<div class="box">
<h1>Registro</h1>
<p class="subtitle">Completá con tus datos y registrate</p>
@if(Session::has('regError'))
	<div class="error">{{ Session::get('error') }}</div>
@endif
@if(Session::has('message'))
	<div class="info">{{ Session::get('message') }}</div>
@endif

<form class="w50" action="{{ route('auth.doRegistro') }}" method="post">
	@csrf
	<div class="label-input">
		<label for="email">E-mail</label>
		<input class="input-type <?php if($errors->has('email')) echo 'input-has-error'?>" type="email" name="email" value="{{ old('email') }}" class="form-control">
		@if($errors->has('email'))
				<div class="error">{{ $errors->first('email') }}</div>
				@endif
	</div>
	<div class="label-input">
		<label for="password">Contraseña</label>
		<input class="input-type <?php if($errors->has('password')) echo 'input-has-error'?>" type="password" name="password" class="form-control">
		@if($errors->has('password'))
				<div class="error">{{ $errors->first('password') }}</div>
				@endif
	</div>
	<div class="label-input">
		<input class="blue-btn" type="submit" value="Registrate">
	</div>
</form>

</div>
</section>


@endsection
