@extends('layouts.layout1')

@section('layout')
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/img/svg/logo.svg')}}" type="image/x-icon">
<!-- Custom styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">


<div class="layer"></div>
<main class="page-center">
  <!-- {{$request}} -->
  <article class="sign-up">
    <h1 class="sign-up__title">Alterar Senha</h1>
    <p class="sign-up__subtitle">Insira a nova Senha</p>
    <form class="sign-up-form form" action="{{route('password.store',['token'=>$request])}}" method="POST">
        @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" placeholder="Email" required name="email" value="{{@old('email')}}">
      <label>
      <label class="form-label-wrapper">
        <p class="form-label">Senha</p>
        <input class="form-input" type="password" placeholder="Nova Senha" required name="password">
      <label>
      <label class="form-label-wrapper">
        <p class="form-label">Confirmar Senha</p>
        <input class="form-input" type="password" placeholder="Confirmar Nova Senha" required name="password_confirmation">
      <label>
        <button class="form-btn primary-default-btn transparent-btn">Alterar</button> 
    </form>
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
  </article>
</main>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 

<!-- Chart library -->
<script src="{{asset('assets/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('assets/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('assets/js/script.js')}}"></script>
@endsection

