@extends('public.layout.public')

@section('pageTitle', $menu->name)

@section('metaDescription', strip_tags($menu->description))

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
	
	@include('public.partials._footer')	

@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection

