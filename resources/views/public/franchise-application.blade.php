@extends('public.layout.public')

@section('pageTitle', 'Franchise Application')

@section('bodyClass', 'page')

@section('content')


	<div class="row">
		
		<div class="col-md-12">
			<h2>Franchise Application</h2>
		</div>

		
		<div class="col-md-6">

			@include('errors.form')

			<form method="POST">

				{!! csrf_field() !!}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="First Name, Last Name" />
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<textarea name="address" id="address" class="form-control" placeholder="Complete Address"></textarea>
				</div>	

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="+971 00 000 0000" />
						</div>	
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="your@email.com" />
						</div>
					</div>
				</div>	


				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="cashAvailable">Cash Available for Investment</label>
							
							<select class="form-control" name="cashAvailable" id="cashAvailable">
								<option value="" selected="selected">Select</option>
								<option value="$0 - $250,000">0 - $250,000</option>
								<option value="$250,000 $500,000">$250,000 - $500,000</option>
								<option value="$500,000 - $750,000">$500,000 - $750,000</option>
								<option value="$750,000 - $1,000,000">$750,000 - $1,000,000</option>
								<option value="$1,000,000+">$1,000,000+</option>
							</select>												
																
						</div>	
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="netWorth">Net Worth</label>
							<select class="form-control" name="netWorth" id="netWorth">
			                	<option value="" selected="selected">Select</option>
								<option value="$250,000 - $500,000">$250,000 - $500,000</option>
								<option value="$500,000 - $1,000,000">$500,000 - $1,000,000</option>
								<option value="$1,000,000 - $2,000,000">$1,000,000 - $2,000,000</option>
								<option value="$2,000,000 - $3,000,000">$2,000,000 - $3,000,000</option>
								<option value="$3,000,000 - $4,000,000">$3,000,000 - $4,000,000</option>
								<option value="$4,000,000">$4,000,000+</option>
			                </select>														
							
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="investmentTimeFrame">Investment Time frame</label>
							<select class="form-control" name="investmentTimeFrame" id="investmentTimeFrame">
								<option value="" selected="selected">Select</option>
								<option value="0-3months">0-3 Months</option>
								<option value="3-6months">3-6 Months</option>
								<option value="6-9months">6-9 Months</option>
								<option value="9-12months">9-12 Months</option>
								<option value="12months+">12 Months+</option>
							</select>											
						</div>	
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="desiredLocation">Desired Location</label>
							<input type="text" name="desiredLocation" id="desiredLocation" class="form-control" value="{{ old('desiredLocation') }}" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-black btn-lg">Submit Application</button>
				</div>																																														
			</form>
		</div>

		
	</div>



@endsection