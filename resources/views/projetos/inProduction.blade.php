@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<div class="row">
	<div class="col">
		<a class="btn btn-outline-primary" href="{{route('projetos.create')}}">+</a>
	</div>
</div>

<table class="table mt-2">
	<thead>
		<th>Nome</th>
		<th>Descrição</th>
		<th>Status</th>
		<th>Ação</th>
	</thead>
	<tbody>
		@foreach($projetos as $projeto)
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
				<a href="{{route('projetos.show',$projeto->id)}}" class="btn btn-outline-primary">Show</a>
				<a href="{{url('projeto/closed',$projeto->id)}}" class="btn btn-outline-primary">Fechar Projeto</a>	
				@if($message = Session::get('sessaoAberta'))
					<span class="badge text-bg-warning">{{$message}}</span>
				@endif
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>

{{$projetos->links()}}
@endsection