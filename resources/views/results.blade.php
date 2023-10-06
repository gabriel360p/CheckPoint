@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
@php 
  //sessaos
  use App\Models\Categoria ;
  use App\Models\Projeto;
@endphp


@if(count($sessaosFeitos)==0||count($sessaosFinalidades)==0) 
 @else 
<div class="row">
  <span class="display-4">Sessões encontradas:</span>
  <div class="col">

    <table class="table mt-2">
      <thead>
        <th>Finalidade</th>
        <th>Categoria</th>
        <th>Situação</th>
        <th>Projeto</th>
        <th>Abertura</th>
        <th>Fechamento</th>
        <th>Ação</th>
      </thead>
      <tbody>
        @foreach($sessaosFeitos as $sessao)
        <tr>
          <td>{{$sessao->finalidades}}</td>
          @php
            $categoria = Categoria::find($sessao->categoria_id);
          @endphp
          <td>{{$categoria->nome}}</td>
          <td>
            @if($sessao->aberta==true)
              <span class="badge text-bg-warning">Aberta</span>
            @else
              <span class="badge text-bg-success">Fechada</span>
            @endif
          </td>
          @php
            $projeto=Projeto::find($sessao->projeto_id);
          @endphp
        <td>{{$projeto->nome}}</td>
        <td>{{$sessao->abertura}}</td>
        @if($sessao->fechamento==null)
          <td><span class="badge text-bg-warning">Ainda não foi fechado</span></td>
        @else
          <td>{{$sessao->fechamento}}</td>
        @endif

        <td>
          @if($sessao->aberta==true)
          <div class="btn-group"> 
              <a href="{{route('sessao.closedPage',$sessao->id)}}" class="btn btn-outline-primary" ><i class="fa-solid fa-xmark"></i></a>
              <a href="{{route('sessaos.show',$sessao->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></a>
          </div>  
          @else
          <div class=" btn-group">  
            <a href="{{route('sessao.reopen',$sessao->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-rotate-left"></i></a>
            <a href="{{route('sessao.details',$sessao->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></a>
        </div>
        @endif
        </td>

        </tr>
        @endforeach

      </tbody>
    </table>
    
  </div>
</div>

<div class="row">
  <div class="col">

    <table class="table mt-2">
      <thead>
        <th>Finalidade</th>
        <th>Categoria</th>
        <th>Situação</th>
        <th>Projeto</th>
        <th>Abertura</th>
        <th>Fechamento</th>
        <th>Ação</th>
      </thead>
      <tbody>
        @foreach($sessaosFinalidades as $sessao)
        <tr>
          <td>{{$sessao->finalidades}}</td>
          @php
            $categoria = Categoria::find($sessao->categoria_id);
          @endphp
          <td>{{$categoria->nome}}</td>
          <td>
            @if($sessao->aberta==true)
              <span class="badge text-bg-warning">Aberta</span>
            @else
              <span class="badge text-bg-success">Fechada</span>
            @endif
          </td>
          @php
            $projeto=Projeto::find($sessao->projeto_id);
          @endphp
        <td>{{$projeto->nome}}</td>
        <td>{{$sessao->abertura}}</td>
        @if($sessao->fechamento==null)
          <td><span class="badge text-bg-warning">Ainda não foi fechado</span></td>
        @else
          <td>{{$sessao->fechamento}}</td>
        @endif

        <td>
          @if($sessao->aberta==true)
          <div class="btn-group"> 
              <a href="{{route('sessao.closedPage',$sessao->id)}}" class="btn btn-outline-primary" ><i class="fa-solid fa-xmark"></i></a>
              <a href="{{route('sessaos.show',$sessao->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></a>
          </div>  
          @else
          <div class=" btn-group">  
            <a href="{{route('sessao.reopen',$sessao->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-rotate-left"></i></a>
            <a href="{{route('sessao.details',$sessao->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></a>
        </div>
        @endif
        </td>

        </tr>
        @endforeach

      </tbody>
    </table>
    
  </div>
</div>
@endif



{{-- @if(count($projetosNome)==0||count($projetosDesc)==0) --}}
{{-- @else --}}
<hr>
<div class="row">
  <span class="display-4">Projetos Encontrados:</span>
  <div class="col">
    
    <table class="table mt-2">
      <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ação</th>
      </thead>
      <tbody>
        @foreach($projetosNome as $projeto)
        <tr>
          <td>{{$projeto->nome}}</td>
          <td>{{$projeto->descricao}}</td>
          <td>
            @if($projeto->producao==true) 
              <span class="badge text-bg-warning">Em produção</span>
            @else
              <span class="badge text-bg-warning">Fora de produção</span>
            @endif
          </td>

          <td>
            <div class="btn-group">
              <a href="{{route('projetos.show',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></a>
              <a href="{{url('projeto/sessionsProject',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-table-list"></i></a>
              @if($projeto->producao==true)
                <a href="{{url('projeto/closed',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-xmark"></i></a>
              @else
                <a href="{{url('projeto/reopen',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-rotate-left"></i></a>
              @endif
              @if($message = Session::get('sessaoAberta'))
                <span class="badge text-bg-warning">{{$message}}</span>
              @endif
            </div>
          </td>
          
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

<div class="row">
  <div class="col">
    
    <table class="table mt-2">
      <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ação</th>
      </thead>
      <tbody>
        @foreach($projetosDesc as $projeto)
        <tr>
          <td>{{$projeto->nome}}</td>
          <td>{{$projeto->descricao}}</td>
          <td>
            @if($projeto->producao==true) 
              <span class="badge text-bg-warning">Em produção</span>
            @else
              <span class="badge text-bg-warning">Fora de produção</span>
            @endif
          </td>

          <td>
            <div class="btn-group">
              <a href="{{route('projetos.show',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></a>
              <a href="{{url('projeto/sessionsProject',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-table-list"></i></a>
              @if($projeto->producao==true)
                <a href="{{url('projeto/closed',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-xmark"></i></a>
              @else
                <a href="{{url('projeto/reopen',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-rotate-left"></i></a>
              @endif
              @if($message = Session::get('sessaoAberta'))
                <span class="badge text-bg-warning">{{$message}}</span>
              @endif
            </div>
          </td>
          
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
{{-- @endif --}}

@endsection