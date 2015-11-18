@extends('public.layout.public')

@section('pageTitle', $category->name)

@section('metaDescription', strip_tags($category->description))

@section('bodyClass', 'page')

@section('content')


	<div class="row">
		<div class="featured-details">
			<div class="col-md-5">
				<div class="wow fadeInLeft">
					<h1>{{ $category->name }}</h1>
					<p class="text-muted">{!! $category->description !!}</p>	
				</div>
			</div>

			<div class="col-md-7">
				<div class="wow fadeInRight">
					
					{!! display($category->photos) !!}
					
				</div>
			</div>
		</div>
	</div>

	<hr />

	<div class="row">
		
		<div class="col-md-12">

			<div class="menus">

				<div class="row">

					@forelse( $category->menus as $menu)

					
						<div class="col col-md-3 col-xs-6">

							<figure class="menus__menu wow fadeInLeft" data-wow-delay="0.{{$menu->id+1}}s">

								<a href="{{ route('menu', [$category->slug, $menu->slug]) }}">&nbsp;</a>
							
								{!! display($menu->photos) !!}
							
								<figcaption>
							
									<h4 class="menu__name text-muted">{{ $menu->name }}</h4>
							
								</figcaption>	
							
							</figure>
							
						</div>
						

					@empty


					@endforelse
				
				</div>
			</div>				

		</div>
	</div>

	@include('public.partials._footer')	
	
@endsection

