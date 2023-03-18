@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<div class="row">
	<div class="col">
		<a class="btn btn-outline-primary" href="{{route('categorias.create')}}"><i class="fa-solid fa-plus"></i><</a>
	</div>
</div>

<table class="table mt-2">
	<thead>
		<th>Nome</th>
	</thead>
	<tbody>
		@foreach($categorias as $categoria)
		<tr>
			<td>{{$categoria->nome}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{$categorias->links()}}
@endsection