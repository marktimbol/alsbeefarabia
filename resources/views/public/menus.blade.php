@extends('public.layout.public')

@section('pageTitle', "Discover Al's Italian Beef")

@section('bodyClass', 'page')

@section('content')

	<div class="row">
		
		<div class="featured-details">
			<div class="col-md-5">
				<div class="wow fadeInLeft">
					<h1>Discover Al's Italian Beef</h1>
					<p class="text-muted">
						Oven roasted perfectly Italian seasoned beef tender and extremely lean sliced amazinglythin with original flavor
					</p>
				</div>
			</div>

			<div class="col-md-7">
				<div class="wow fadeInRight">
					<img src="{{ asset('images/slide-sandwich.png') }}" alt="" title="" class="img-responsive" />
				</div>
			</div>
		</div>														

	</div>

	<div class="row">
		
		<div class="col-md-12">
		
			<h2 class="pageTitle">Menus</h2>

			@foreach($categories->chunk(6) as $category_chunks)

				<div class="row row-eq-height">

					@foreach( $category_chunks as $category )

						<div class="col-md-2">
							
							<figure class="wow fadeInLeft" data-wow-delay="0.{{$category->id+1}}s">
								
								<a href="{{ route('menusByCategory', $category->slug) }}"></a>

								{!! display($category->photos) !!}

								<figcaption>

									<h4 class="text-muted">{{ $category->name }}</h4>
								
								</figcaption>

							</figure>
						
						</div>

					@endforeach

				</div>
	
			@endforeach

			

		</div>
	</div>

@endsection
