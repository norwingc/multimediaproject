@extends('templates.blogtemplate')
@section('contenido')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@foreach($articulos as $value)
	<article class="post">
		<div class="descripcion">
			<figure class="imagen">
				<img src="{{ asset('img/foto.jpg') }}" />
			</figure>
			<div class="detalles">
				<h2 class="titulo">
						{{ $value->titulo }}
				</h2>
				<p class="autor">
					<?php $user = User::find( $value->usuario_id) ?>
					por <a href="{{ URL::to('usuarios/perfil/'. $user->id .'') }}"> {{ $user->username }} </a>
				</p>
				<a class="tag" href="#">{{ $value-> tag}}</a>
				<p class="fecha">hace <strong>20</strong> min</p>
			</div>
		</div>
		<div class="acciones">
			<div class="votos">
				<a class="up" href="#"></a>
				<span class="total">{{ $value->votos}}</span>
				<a class="down" href="#"></a>
			</div>
			<div class="datos">
				<a class="comentarios" href="{{ URL::to('articulo/ver/'. $value->id .'') }}">
					10
				</a>
				<a class="estrellita" href="#"></a>
			</div>
		</div>
	</article>	
@endforeach		
@stop


<!--select * from articulos where id_usuario = usuario id-->