@extends('layouts.layout2')

@section('layout2')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/createCategorie.css')}}">
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/img/svg/logo.svg')}}" type="image/x-icon">
<!-- Custom styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
@endsection

@section('layout2-body')


<!-- <div class="layer"></div> -->
<div class="container">
	<div class="row">
	    <h1 class="sign-up__title">Perfil</h1>
	</div>

	<div class="row">
		<div class="row stat-cards">
		  <div class="col-md-6 col-xl-3">
		    <article class="stat-cards-item">
		      <a href="{{url('projetos')}}">
		        <div class="stat-cards-icon primary">
		          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
		        </div>
		      </a>
		      <div class="stat-cards-info">
		        <p class="card-title">Total de Projetos</p>
		        <br>
		        @php
		          use App\Models\Projeto;
		          $countAllProjetcs =  Projeto::where('user_id',Auth::id())->count();
		        @endphp
		        <p class="stat-cards-info__num">{{$countAllProjetcs}}</p>
		      </div>
		    </article>
		  </div>


		  <div class="col-md-6 col-xl-3">
		    <article class="stat-cards-item">
		      <a href="{{url('projeto/inProduction')}}">

		        <div class="stat-cards-icon primary">
		          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
		        </div>
		      </a>
		      <div class="stat-cards-info">
		        @php
		          $countProjectsOpens =  Projeto::where('producao',true)->where('user_id',Auth::id())->count();
		        @endphp
		        <p class="card-title">Em produção</p>
		        <br>
		        <p class="stat-cards-info__num">{{$countProjectsOpens}}</p>
		      </div>
		    </article>
		  </div>

		<div class="col-md-6 col-xl-3">
		    <article class="stat-cards-item">
		      <a href="{{url('sessao/all')}}">
		        <div class="stat-cards-icon primary">
		          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
		        </div>
		      </a>
		        <div class="stat-cards-info">
		          @php
		            use App\Models\Sessao;
		            $countAllSessions=Sessao::where('user_id',Auth::id())->count();
		          @endphp
		          <p class="card-title">Total de Sessãos</p>
		          <br>
		          <p class="stat-cards-info__num">{{$countAllSessions}}</p>
		        </div>
		    </article>
		  </div>


		  <div class="col-md-6 col-xl-3">
		    <article class="stat-cards-item">
		      <a href="{{route('sessao.opens')}}"> 
		        <div class="stat-cards-icon primary">
		          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
		        </div>
		      </a>
		        <div class="stat-cards-info">
		          @php
		            $countSessionsClosed =  Sessao::where('aberta',false)->where('user_id',Auth::id())->count();
		          @endphp
		          <p class="card-title" style="font-size:15px;">Sessões fechadas</p>
		          <br>
		          <p class="stat-cards-info__num">{{$countSessionsClosed}}</p>
		        </div>
		    </article>
		  </div>
		</div>

	</div>
	
</div>

<main class="page-center">
	<form class="sign-up-form form" action="{{route('user.update',$user->id)}}" method="POST">
	@csrf
		<article class="sign-up">
			<div class="row">
				<div class="col">
				      <label class="form-label-wrapper">
				        <p class="form-label">Email</p>
				        <input class="form-input" type="email" placeholder="Email"   name="email" value="{{$user->email}}">
				        @error('email')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>

				      <label class="form-label-wrapper">
				        <p class="form-label">Nome</p>
				        <input class="form-input" type="text" placeholder="Nome"   name="name" value="{{$user->name}}">
				        @error('name')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>

				      <label class="form-label-wrapper mb-2">
				        <p class="form-label">Alterar Senha</p>
				      	<a class="link-info forget-link" href="{{route('password.request')}}">Solicitar Mudança de Senha</a>
				      </label>
				      <!-- <button class="form-btn primary-default-btn transparent-btn">Editar</button> -->
				</div>
				<div class="col">
				      <label class="form-label-wrapper">
				        <p class="form-label">Senha</p>
				        <input class="form-input" type="password" placeholder="Senha"   name="password">
				        @error('password')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>

				      <label class="form-label-wrapper">
				        <p class="form-label">Confirmar Senha</p>
				        <input class="form-input" type="password" placeholder="Senha"   name="password_confirmation">
				        @error('password_confirmation')
				          <span class="badge text-bg-warning">{{$message}}</span>
				        @enderror
				      </label>
					@if($message = Session::get('errorSenha'))
						<span class="badge text-bg-warning">{{$message}}</span>
					@endif
				</div>
			</div>
			@if($message = Session::get('saved'))
				<span class="badge text-bg-success">{{$message}}</span>
			@endif
			<button class="form-btn primary-default-btn transparent-btn">Salvar</button>
		</article>			
	</form>	
</main>

<!-- Chart library -->
<script src="{{asset('assets/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('assets/plugins/feather.min.js')}}"></script>
@endsection