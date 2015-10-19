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

			<div class="menus">

				@foreach($categories as $category)

					<div class="col col-md-3 col-xs-4">
						
						<figure class="menus__menu wow fadeInLeft" data-wow-delay="0.{{$category->id+1}}s">
							
							<a href="{{ route('menusByCategory', $category->slug) }}"></a>

							{!! display($category->photos) !!}

							<figcaption>

								<h4 class="menu__name text-muted">{{ $category->name }}</h4>
							
							</figcaption>

						</figure>
					
					</div>

				@endforeach

			</div>

		</div>
	</div>

@endsection
