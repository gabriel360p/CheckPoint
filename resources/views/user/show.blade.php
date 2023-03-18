@extends('layouts.layout2')

@section('layout2')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/createCategorie.css')}}">
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/img/svg/logo.svg')}}" type="image/x-icon">
<!-- Custom styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
@endsection

@section('layout2-body')


<!-- <div class="layer"></div> -->

<main class="page-center">
	<div class="row">
	    <h1 class="sign-up__title">Perfil</h1>
	    <p class="sign-up__subtitle">Dados do perfil</p>
	</div>

	<form class="sign-up-form form" action="{{route('deflogin')}}" method="POST">
	@csrf
		<article class="sign-up">
			<div class="row">
				<div class="col">
				      <label class="form-label-wrapper">
				        <p class="form-label">Email</p>
				        <input class="form-input" type="email" placeholder="Email" required name="email" value="{{$user->email}}">
				        @error('email')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>

				      <label class="form-label-wrapper">
				        <p class="form-label">Nome</p>
				        <input class="form-input" type="text" placeholder="Senha" required name="name" value="{{$user->name}}">
				        @error('name')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>

				      <label class="form-label-wrapper">
				        <p class="form-label">Password</p>
				        <input class="form-input" type="password" placeholder="Senha" required name="password">
				        @error('password')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>
				      <a class="link-info forget-link" href="##">Esqueceu a senha?</a>
				      <label class="form-checkbox-wrapper">
				        <input class="form-checkbox" type="checkbox" name="remember">
				        <span class="form-checkbox-label">Lembrar-me</span>
				      </label>
				      <button class="form-btn primary-default-btn transparent-btn">Login</button>
				</div>
				<div class="col">
				      <label class="form-label-wrapper">
				        <p class="form-label">Email</p>
				        <input class="form-input" type="email" placeholder="Email" required name="email">
				        @error('email')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>
				      <label class="form-label-wrapper">
				        <p class="form-label">Password</p>
				        <input class="form-input" type="password" placeholder="Senha" required name="password">
				        @error('password')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>
				      <a class="link-info forget-link" href="##">Esqueceu a senha?</a>
				      <label class="form-checkbox-wrapper">
				        <input class="form-checkbox" type="checkbox" name="remember">
				        <span class="form-checkbox-label">Lembrar-me</span>
				      </label>
				      <button class="form-btn primary-default-btn transparent-btn">Login</button>
				</div>
			</div>
		</article>			
	</form>	
</main>

<!-- Chart library -->
<script src="{{asset('assets/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('assets/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('assets/js/script.js')}}"></script>
@endsection