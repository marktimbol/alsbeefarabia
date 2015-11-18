@extends('public.layout.public')

@section('pageTitle', 'Contact Us')

@section('metaDescription', 'We look forward to hearing from you! We want to know your thoughts.')

@section('header_styles')
    <link rel="stylesheet" href="{{ elixir('css/sweetalert.css') }}" />
@endsection

@section('bodyClass', 'page')

@section('content')


	<div class="row">
		
		<div class="col-md-12">
			<h2 class="pageTitle">Contact Us</h2>
			<p>We look forward to hearing from you! We want to know your thoughts.</p>
		</div>

		
		<div class="col-md-6">

			@include('errors.form')

			<form method="POST">

				{!! csrf_field() !!}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="First Name, Last Name" required />
				</div>

				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="+971 00 000 0000" required />
				</div>					

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="your@email.com" required />
				</div>


				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message_content" id="message" class="form-control" rows="10" required></textarea>
				</div>
				

				<div class="form-group">
					<button type="submit" class="btn btn-black btn-lg">Send Inquiry</button>
				</div>																																														
			</form>
		</div>

		
	</div>

	@include('public.partials._footer')	



@endsection

@section('footer_scripts')
    <script src="{{ elixir('js/sweetalert.js') }}"></script>
@endsection