@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<div class="row">
	<div class="col">
		<a class="btn btn-outline-primary" href="{{route('projetos.create')}}"><i class="fa-solid fa-plus"></i></a>
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
				<div class="btn-group">	
					<a href="{{route('projetos.show',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-info"></i></a>
					<a href="{{url('projeto/sessionsProject',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-table-list"></i></a>
					<a href="{{url('projeto/closed',$projeto->id)}}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-rotate-left"></i></a>
				</div>
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>

{{$projetos->links()}}
@endsection