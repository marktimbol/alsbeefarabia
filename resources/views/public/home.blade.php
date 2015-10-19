@extends('public.layout.public')

@section('pageTitle', 'Home')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('bodyClass', 'home')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="als-slideshow wow fadeInUp">
				<div id="als-slide" class="owl-carousel owl-theme">
					
					@forelse( $slides as $slide ) 

						{!! display($slide->photos, 'home') !!}

					@empty


					@endforelse
					
				</div>						
			</div>
		</div>
	</div>

	<div class="row m-t-50">

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