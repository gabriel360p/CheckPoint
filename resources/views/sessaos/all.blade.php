@extends('layouts.layout2')

@section('layout2')
@endsection

@section('layout2-body')
<div class="row">
	<div class="col">
		<a class="btn btn-outline-primary" href="{{route('sessaos.create')}}">+</a>
	</div>
</div>

<table class="table mt-2">
	<thead>
		<th>Finalidade</th>
		<th>Categoria</th>
		<th>Situação</th>
		<th>Projeto</th>
		<th>Abertura</th>
		<th>Fechamento</th>
	</thead>
	<tbody>
		@php 
			use App\Models\Categoria ;
			use App\Models\Projeto;
		@endphp
		@foreach($sessaos as $sessao)
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
		</tr>
		@endforeach

	</tbody>
</table>

{{$sessaos->links()}}
@endsection