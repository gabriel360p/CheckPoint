@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/img/svg/logo.svg')}}" type="image/x-icon">
<!-- Custom styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">


<div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Nova Categoria</h1>
    <p class="sign-up__subtitle">Insira o nome da nova categoria</p>
    <form class="sign-up-form form" method="POST" action="{{route('categorias.store')}}">

        @csrf
      <label class="form-label-wrapper">
        <p class="form-label">Categoria</p>
        <input class="form-input" type="text" placeholder="Nome da Categoria" required name="categoria">
        @error('categoria')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>
      <button class="form-btn primary-default-btn transparent-btn">Salvar</button>
    </form>
  </article>
</main>


<!-- Chart library -->
<script src="{{asset('assets/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('assets/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<!-- <script src="{{asset('assets/js/script.js')}}"></script> -->
@endsection