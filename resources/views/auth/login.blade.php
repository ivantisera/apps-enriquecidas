@extends('layouts.noheader')

@section('title', 'Iniciar Sesión')

@section('main')
<section class="form-body">

	<div class="box">
		<h1>Iniciar Sesión</h1>
		<p>Complete los datos a continuación con sus credenciales de acceso.</p>
		@if(Session::has('loginError'))
		<div class="error">{{ Session::get('loginError') }}</div>
		@endif
		@if(Session::has('message'))
			<div class="info">{{ Session::get('message') }}</div>
		@endif

		<form action="{{ route('auth.doLogin') }}" method="post">
			@csrf
			<div>
				<label for="email">E-mail</label>
				<input type="email" name="email" value="{{ old('email') }}"  class="email">
				@if($errors->has('email'))
				<div class="error">{{ $errors->first('email') }}</div>
				@endif
			</div>
			<div>
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="email">
				@if($errors->has('password'))
				<div class="error">{{ $errors->first('password') }}</div>
				@endif
			</div>
			<a  class="btn" id="btn2" href="<?=route("registro");?>">Registrarse</a>
			<input type="submit" class="btn" value="Ingresar" />
		
		</form>
	</div>

</section>



@endsection