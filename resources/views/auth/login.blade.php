@extends('layouts.layout1')

@section('layout')
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/img/svg/logo.svg')}}" type="image/x-icon">
<!-- Custom styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">


<div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Bem vindo de volta!</h1>
    <p class="sign-up__subtitle">Insira os seus dados para continuar</p>
    <form class="sign-up-form form" action="{{route('deflogin')}}" method="POST">
        @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" placeholder="Email" required name="email">
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" placeholder="Senha" required name="password">
      </label>
      <a class="link-info forget-link" href="##">Esqueceu a senha?</a>
      <label class="form-checkbox-wrapper">
        <input class="form-checkbox" type="checkbox" >
        <span class="form-checkbox-label">Lembrar-me</span>
      </label>
      <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
    </form>
  </article>
</main>


<!-- Chart library -->
<script src="{{asset('assets/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('assets/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('assets/js/script.js')}}"></script>
@endsection