@extends('public.layout.public')

@section('pageTitle', 'About Us')

@section('bodyClass', 'page')

@section('content')


	<div class="row">

		<div class="col-md-12">
			<h2 class="pageTitle">About Us</h2>
		</div>

	
		<div class="col-md-3 wow fadeInLeft">
			<img src="{{ asset('images/about-us-1.png') }}" alt="" title="" class=" img-responsive" />
		</div>

		<div class="col-md-9 wow fadeInRight">
			<p>
				The Sandwich That Started It All  The history of Al’s #1 Italian Beef Restaurants dates back to 1938 when Al Ferrari and his sister and brother-in-law, Frances and Chris Pacelli, Sr., developed the original idea and recipe for the original Italian beef sandwich. The great Chicago sandwich was actually formed out of necessity during the Great Depression when meat was scarce. In order to make the most of what they had, Chris and Al would slice the meat very thin and place it on thick loaves of fresh made Italian bread. The original recipe, which is still used in all Al’s Beef locations today, was developed in Al’s home kitchen. The family sold the delicious sandwiches at a neighborhood food stand and delivered them to local businesses until they opened their current location on West Taylor Street in Chicago.  It was at this storefront where they added other items to the menu, including Italian sausage, Chicago hot dogs, homemade hand-cut French fries and Polish sausages, to name a few.  Taylor Street remains today as one of Chicago's truly iconic food destinations.
			</p>
			<p>&nbsp;</p>
		</div>
	
		<div class="col-md-9 wow fadeInLeft">
			<h3>From Food Stand To Franchise</h3>
			<p>
				What started in 1938 as a neighborhood food stand in Chicago’s “Little Italy,” has grown into a quintessential food icon and Chicago legend. In 1999, Dave Howey of Chicago Franchise Systems, Inc., owner and franchisor of Nancy’s Pizza, purchased the rights to Al’s #1 Italian Beef Restaurants. A longtime customer himself since 1974, Mr. Howey saw the potential and expanded the local legend to other markets, opening the first franchise location in Tinley Park, IL in 2001. Howey has continued to expand the restaurant across the country from Las Vegas to southern California with many new locations on the horizon. 								
			</p>
			<p>&nbsp;</p>
		</div>						

		<div class="col-md-3 wow fadeInRight">
			<img src="{{ asset('images/about-us-2.jpg') }}" alt="" title="" class=" img-responsive" />
		</div>	

		<div class="clearfix"></div>

		<div class="col-md-3 wow fadeInLeft">
			<img src="{{ asset('images/mike-ditka.jpg') }}" alt="" title="" class=" img-responsive" />
		</div>

		<div class="col-md-9 wow fadeInRight">
			<h3>Spokesperson</h3>
			<p>
				We are proud to have Mike Ditka, retired Hall of Fame NFL football player, former NFL coach and TV commentator, as our official spokesperson, advisor, and "taster" who is working with the company to scout new franchise locations across the country in NFL cities.	
			</p>
		</div>									
	
	</div>


	@include('public.partials._footer')	

@endsection