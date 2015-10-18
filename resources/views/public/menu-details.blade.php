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

{{-- 	<hr />
	
	<div class="row">

		<div class="col-md-4">
			<img src="http://placehold.it/500x140" alt="" title="" class="img-responsive" />
		</div>

		<div class="col-md-4">
			<img src="http://placehold.it/500x140" alt="" title="" class="img-responsive" />
		</div>

		<div class="col-md-4">
			<img src="http://placehold.it/500x140" alt="" title="" class="img-responsive" />
		</div>
	</div>	 --}}

@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection

