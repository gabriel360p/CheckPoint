@extends('layouts.layout1')

@section('layout')
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/img/svg/logo.svg')}}" type="image/x-icon">
<!-- Custom styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">


<div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Alterar Senha</h1>
    <p class="sign-up__subtitle">Antes, confirme o email</p>
    <form class="sign-up-form form" action="{{route('password.email')}}" method="POST">
        @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" placeholder="Email" required name="email">
        @error('email')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>
      @if($message=Session::get('status'))
        <span class="badge text-bg-primary">{{$message}}</span>
      @endif
      @if($message=Session::get('email'))
        <span class="badge text-bg-primary">{{$message}}</span>
      @endif
      <button class="form-btn primary-default-btn transparent-btn">Verificar</button>
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

