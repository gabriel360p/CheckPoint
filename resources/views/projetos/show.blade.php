@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">{{$projeto->nome}}</h1>
    <form class="sign-up-form form" action="{{route('projetos.update',['projeto'=>$projeto->id])}}" method="post">
    	@csrf
      <label class="form-label-wrapper">
        <p class="form-label">Nome do projeto</p>
        <small>Insira o nome do projeto</small>
        <input class="form-input" type="text" name="nome" required value="{{$projeto->nome}}">
      </label>

      <label class="form-label-wrapper">
        <p class="form-label">Descrição</p>
        <small>Insira descrição do projeto</small>
        <textarea class="form-input" placeholder="Breve descrição do projeto" cols="50" name="descricao" required>{{$projeto->descricao}}</textarea>
      </label>


      <label class="form-label-wrapper">
        <p class="form-label">Link 1 do projeto</p>
        <small>Insira o link 1 de repositório</small>
        <input class="form-input" type="url" name="link1Projeto" value="{{$projeto->link1Projeto}}">
      </label>


      <label class="form-label-wrapper">
        <p class="form-label">Link 2 do projeto</p>
        <small>Insira o link 2 de repositório</small>
        <input class="form-input" type="url" name="link2Projeto" value="{{$projeto->link2Projeto}}">
      </label>

     		<button class="form-btn primary-default-btn transparent-btn">Salvar</button>

    </form>
  </article>
</main>

@endsection