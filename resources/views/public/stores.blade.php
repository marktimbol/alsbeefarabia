@extends('public.layout.public')

@section('pageTitle', 'Stores')

@section('metaDescription', 'Als Beef Stores')

@section('bodyClass', 'page')

@section('content')

	<div class="row">

		<div class="col-md-12">
			<h2 class="pageTitle">Stores</h2>

			<div class="stores">

				<?php $count = 1; ?>
				
				@forelse( $stores->chunk(1) as $chunks )

					<div class="row store {{ $count % 2 <> 0 ? 'left' : 'right' }}">

						@foreach($chunks as $store )
					
{{-- 							<div class="store__photo wow fadeInLeft">

								<div class="col-md-6 col p-r-0">
						
								{!! display($store->photos) !!}
						
								</div>

							</div> --}}

							<div class="store__info wow fadeInRight">
							
								<div class="col-md-6">
							
									<h3>{{ $store->name }}</h3>

									{!! $store->description !!}

									<ul>

										<li>
											<i class="fa fa-envelope"></i>
											<a href="mailto:jumeirah@alsbeef.ae">jumeirah@alsbeef.ae</a>
										</li>

										<li>
											<i class="fa fa-phone"></i>
											{{ $store->contact }}
										</li>

										<li>
											<i class="fa fa-map-marker"></i>
											{{ $store->address }}
										</li>																												
									</ul>
								</div>
							
							</div>							

						@endforeach

					</div>
				

					<?php $count++; ?>
				@empty

					<h4>Opening soon in Jumeirah.</h4>

				@endforelse

			</div>
		
		</div>

	
	</div>

	@include('public.partials._footer')	


@endsection