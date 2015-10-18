@extends('public.layout.public')

@section('pageTitle', $category->name)

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

			<div class="als-menu">

				@forelse( $category->menus->chunk(6) as $menus)

					<div class="row row-eq-height">

						@foreach($menus as $menu)

						<div class="col-md-2">

							<figure class="wow fadeInLeft" data-wow-delay="0.{{$menu->id+1}}s">

								<a href="{{ route('menu', $menu->slug) }}">&nbsp;</a>
							
								{!! display($menu->photos) !!}
							
								<figcaption>
							
									<h4 class="text-muted">{{ $menu->name }}</h4>
							
								</figcaption>	
							
							</figure>
							
						</div>
						
						@endforeach

					</div>

				@empty



				@endforelse
				
			</div>				

		</div>
	</div>
	
@endsection

