@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<div class="row">
	<div class="col">
		<a class="btn btn-outline-primary" href="{{route('categorias.create')}}">+</a>
	</div>
</div>

<table class="table mt-2">
	<thead>
		<th>Nome</th>
		<th>Ação</th>
	</thead>
	<tbody>
		@foreach($categorias as $categoria)
		<tr>
			<td>{{$categoria->nome}}</td>
			<td>
				<form action="{{route('categorias.destroy',$categoria->id)}}" method="post">
					@csrf
					@method('delete')
					<button class="btn btn-outline-warning">Deletar</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{$categorias->links()}}
@endsection