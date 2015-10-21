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