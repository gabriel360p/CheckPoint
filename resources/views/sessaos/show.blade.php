@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Detalhes da Sessão #{{$sessao->id}}</h1>
    <form class="sign-up-form form" action="{{route('sessaos.update',$sessao->id)}}" method="post">
      @csrf
      @method('put')
      <label class="form-label-wrapper">
        <p class="form-label">Finalidade</p>
        <small>Insira o motivo da abertura</small>
        <textarea class="form-input" placeholder="Finalidade" cols="50" name="finalidades" required>{{$sessao->finalidades}}</textarea>
      </label>
      <label class="form-label-wrapper mb-4">
        <p class="form-label">Categoria</p>
          
            <select class="form-control" name="categoria">
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
      </label>


      <label class="form-label-wrapper">
        <p class="form-label">Horário de Abertura</p>
        <small>Insira o horário de Abertura</small>
        <input class="form-input" type="datetime-local" name="abertura" value="{{$sessao->abertura}}" required>
      </label>

        <button class="form-btn primary-default-btn transparent-btn">Salvar Alterações</button>
    </form>
  </article>
</main>

@endsection