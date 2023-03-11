@extends('layouts.layout2')

@section('layout2')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/createCategorie.css')}}">
@endsection

@section('layout2-body')

<div class="wrapper">
        <div class="text-center mt-4 name">
            Criar Nova Categoria
        </div>
        <form class="p-3 mt-3" method="POST" action="{{route('categorias.store')}}">
        	@csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nome" id="userName" placeholder="Nome">
            </div>
            <button class="btn mt-3">Criar</button>
        </form>
    </div>
@endsection