@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Criar Nova Sessão</h1>
    <form class="sign-up-form form" action="{{route('sessaos.store')}}" method="post">
    	@csrf
      <label class="form-label-wrapper">
        <p class="form-label">Finalidade</p>
        <small>Insira o motivo da abertura</small>
        <textarea class="form-input" placeholder="Finalidade" cols="50" name="finalidades" ></textarea>
        @error('finalidades')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>
      <label class="form-label-wrapper mb-4">
        <p class="form-label">Categoria</p>
        	@switch(count($categorias))
        		@case(0)
        			<small>Sem categorias, não tem como abrir uma sessão</small>
        			<a class="btn btn-outline-primary" href="{{route('categorias.create')}}">Criar Categoria</a>
	        		@break

        		@default
      				<select class="form-control" name="categoria">
      				<small>Selecione uma categoria</small>
			    	@foreach($categorias as $categoria)
			    		<option value="{{$categoria->id}}">{{$categoria->nome}}</option>
			    	@endforeach

	    	@endswitch
        </select>
        @error('categoria')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>


    <label class="form-label-wrapper mb-4">
        <p class="form-label">Projeto</p>
          @switch(count($projetos))
            @case(0)
              <small>Sem projetos cadastrados</small>
              <a class="btn btn-outline-primary" href="{{route('projetos.create')}}">Criar Projeto</a>
              @break

            @default
              <select class="form-control" name="projeto">
              <small>Selecione um projeto</small>
            @foreach($projetos as $projeto)
              <option value="{{$projeto->id}}">{{$projeto->nome}}</option>
            @endforeach

        @endswitch
        </select>
        @error('projeto')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>



      <label class="form-label-wrapper">
        <p class="form-label">Horário de Abertura</p>
        <small>Insira o horário de Abertura</small>
        <input class="form-input" type="datetime-local" name="abertura" >
        @error('abertura')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>

        @if((count($categorias)==0)||(count($projetos)==0))
        	<span class="badge text-bg-warning mt-2">Sem Categorias Cadastradas ou Projetos Cadastrados</span>        
        @else
     		<button class="form-btn primary-default-btn transparent-btn">Abrir</button>
       	@endif

    </form>
  </article>
</main>

@endsection