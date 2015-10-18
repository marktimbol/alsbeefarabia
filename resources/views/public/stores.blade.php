@extends('public.layout.public')

@section('pageTitle', 'Stores')

@section('bodyClass', 'page')

@section('content')

	<div class="row">

		<div class="col-md-12">
			<h2 class="pageTitle">Stores</h2>

			<?php $count = 1; ?>
			
			@forelse( $stores->chunk(1) as $chunks )

				<div class="row store {{ $count % 2 <> 0 ? 'left' : 'right' }}">

					@foreach($chunks as $store )
				
						<div class="store__photo">

							<div class="col-md-6 col p-r-0">
					
							{!! display($store->photos) !!}
					
							</div>

						</div>

						<div class="store__info">
						
							<div class="col-md-6 col p-l-0">
						
								<h3>{{ $store->name }}</h3>

								{!! $store->description !!}

								<ul>
									<li>
										<i class="fa fa-map-marker"></i>
										{{ $store->address }}
									</li>

									<li>
										<i class="fa fa-phone"></i>
										{{ $store->contact }}
									</li>																		
								</ul>
							</div>
						
						</div>							

					@endforeach

				</div>
			

				<?php $count++; ?>
			@empty


			@endforelse

		
		</div>

	
	</div>


@endsection