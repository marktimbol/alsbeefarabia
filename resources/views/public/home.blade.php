@extends('public.layout.public')

@section('pageTitle', 'Home')

@section('metaDescription', 'Oven roasted perfectly Italian seasoned beef tender and extremely lean sliced amazingly thin with original flavor')

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

	@include('public.partials._footer')	


@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection