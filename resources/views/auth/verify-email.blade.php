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
    <form class="sign-up-form form text-center" action="{{route('verification.send')}}" method="POST">
    <h1 class="sign-up__title">Um minuto!</h1>
    <p class="sign-up__subtitle">Antes de continuar, por favor confirme o email!</p>
      @csrf
      <button class="btn btn-outline-primary">Enviar Email</button>
      @if($message = Session::get('status'))
        <br>
        <span class="badge text-bg-success mt-2">{{$message}}</span>
      @endif
    </form>
  </article>
</main>


<!-- Chart library -->
<script src="{{asset('assets/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('assets/plugins/feather.min.js')}}"></script>
@endsection