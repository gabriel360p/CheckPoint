@extends('layouts.layout1')

@section('layout')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/auth.css')}}">

<div class="wrapper">
        <div class="logo">
            <!-- <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> -->
            <!-- <img src="https://t9007041908.p.clickup-attachments.com/t9007041908/dc01b404-c35b-40a7-b1f6-5349e2788815/LOGO%20CEMF.png" alt=""> -->
        </div>
        <div class="text-center mt-4 name">
            Cadastrar-se
        </div>
        <form class="p-3 mt-3" method="POST" action="{{url('register')}}">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" id="userName" placeholder="Nome">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="userName" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Confirmar Senha">
            </div>
            <button class="btn mt-3">Cadastrar</button>
        </form>
        <div class="text-center fs-6">
            <a href="{{route('login')}}">Já é cadastrado?</a>
        </div>
    </div>
@endsection