@extends('layouts.layout2')

@section('layout2')

@endsection

@section('layout2-body')
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Detalhes da Sessão #{{$sessao->id}}</h1>
    <form class="sign-up-form form" action="{{route('sessao.closed',$sessao->id)}}" method="post">
    	@csrf
      <label class="form-label-wrapper">
        <p class="form-label">Finalidade</p>
        <small>Insira o motivo da abertura</small>
        <textarea class="form-input" placeholder="Finalidade" cols="50" name="finalidades" required>{{$sessao->finalidades}}</textarea>
        @error('finalidades')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>
      <label class="form-label-wrapper mb-4">
        <p class="form-label">Categoria</p>
        	
        		<select class="form-control" name="categoria" required>
        			<small>Selecione uma categoria</small>
              @php 
                use App\Models\Categoria; 
                $categoria=Categoria::find($sessao->categoria_id);
              @endphp
              <option selected value="{{$categoria->id}}">{{$categoria->nome}}</option>
			    	@foreach($categorias as $categoria)
			    		<option value="{{$categoria->id}}">{{$categoria->nome}}</option>
			    	@endforeach

        </select>
        @error('categoria')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>



      <label class="form-label-wrapper mb-4">
        <p class="form-label">Projetos</p>
          
            <select class="form-control" name="projeto" required>
              <small>Selecione um Projeto</small>
              @php 
                use App\Models\Projeto; 
                $projeto=Projeto::find($sessao->projeto_id);
              @endphp
              <option selected value="{{$projeto->id}}">{{$projeto->nome}}</option>
            @foreach($categorias as $categoria)
              <option value="{{$projeto->id}}">{{$projeto->nome}}</option>
            @endforeach

        </select>
        @error('projeto')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>



      <label class="form-label-wrapper">
        <p class="form-label">Horário de Abertura</p>
        <small>Insira o horário de Abertura</small>
        <input class="form-input" type="datetime-local" name="abertura" value="{{$sessao->abertura}}" required>
        @error('abertura')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>

      <hr>

      <label class="form-label-wrapper">
        <p class="form-label">Horário de Fechamento</p>
        <small>Insira o horário de fechamento</small>
        <input class="form-input" type="datetime-local" name="fechamento" required value="{{$sessao->fechamento}}">
        @error('fechamento')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>

      <label class="form-label-wrapper">
        <p class="form-label">Feitos</p>
        <small>Insira o que foi feito</small>
        <textarea class="form-input" placeholder="Feitos" cols="50" name="feitos" required>{{$sessao->feitos}}</textarea>
        @error('feitos')
          <span class="badge text-bg-warning">{{$message}}</span>
        @enderror
      </label>

     		<button class="form-btn primary-default-btn transparent-btn">Fechar</button>
    </form>
  </article>
</main>

@endsection