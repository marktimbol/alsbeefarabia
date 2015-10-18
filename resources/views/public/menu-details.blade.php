@extends('public.layout.public')

@section('pageTitle', $menu->name)

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('bodyClass', 'page')

@section('content')

	<div class="row">
		<div class="featured-details">
			<div class="col-md-5">
				<div class="wow fadeInLeft">
					<h1>{{ $menu->name }}</h1>
					<p class="text-muted">{!! $menu->description !!}</p>	

				</div>
			</div>

			<div class="col-md-7">
				<div class="wow fadeInRight">
					{!! display($menu->photos) !!}
				</div>
			</div>
		</div>
	</div>

	<hr />
	
	<div class="row">

		<div class="col-md-4 wow fadeInLeft" data-wow-delay="0.2s">
			
			<a href="{{ route('menus') }}">
				{!! getPhoto('discover-our-food.jpg', 'Discover our Food') !!}
			</a>

		</div>

		<div class="col-md-4 wow fadeInLeft" data-wow-delay="0.4s">

			<a href="{{ route('stores') }}">
				{!! getPhoto('where-are-we.jpg', 'Our Stores') !!}
			</a>
		</div>

		<div class="col-md-4 wow fadeInLeft" data-wow-delay="0.6s">
			<a href="{{ route('about') }}">
				{!! getPhoto('who-we-are.jpg', 'About Us') !!}
			</a>
		</div>
	</div>	

@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection

