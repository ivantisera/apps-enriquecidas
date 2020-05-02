@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('main')
<section class="form-body container">

	<div class="box">
		<h1>Iniciar Sesión</h1>
		<p class="subtitle">Completá los datos a continuación con tus credenciales de acceso.</p>
		@if(Session::has('loginError'))
		<div class="error">{{ Session::get('loginError') }}</div>
		@endif
		@if(Session::has('message'))
			<div class="info">{{ Session::get('message') }}</div>
		@endif

		<form class="w50" action="{{ route('auth.doLogin') }}" method="post">
			@csrf
			<div class="label-input">
				<label for="email">E-mail</label>
				<input class="input-type <?php if($errors->has('email')) echo 'input-has-error'?>" type="email" name="email" value="{{ old('email') }}">
				@if($errors->has('email'))
				<div class="error">{{ $errors->first('email') }}</div>
				@endif
			</div>
			<div class="label-input">
				<label for="password">Contraseña</label>
				<input class="input-type <?php if($errors->has('password')) echo 'input-has-error'?>" type="password" name="password">
				@if($errors->has('password'))
				<div class="error">{{ $errors->first('password') }}</div>
				@endif
			</div>
			<div class="label-input mgt-50">
				<a class="white-btn" href="<?=route("registro");?>">O registrate</a>
				<input type="submit" class="blue-btn" value="Ingresa" />
			</div>
		</form>
	</div>

</section>

@endsection