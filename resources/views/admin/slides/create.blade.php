@extends('admin.layout.admin')

@section('pageTitle', 'Add New Slide')

@section('content')
	<div class="row">
		<div class="col-md-12">
		
			<h1>Add New Slide</h1>	

			<div class="row">
				<div class="col-md-9">
					<form method="POST"
						action="{{ route('admin.slides.store') }}">

						{!! csrf_field() !!}

						@include('errors.form')

						<div class="form-group">

							<div class="form-group">
								<label for="link">Link</label>
								<input type="text" 
									name="link" 
									id="link" 
									class="form-control" 
									placeholder="Paste your link here"
									required />
							</div>

							<hr />

							<div class="form-group">
								<button type="submit" class="btn btn-primary">Save Record</button>
							</div>		
						</div>
					</form>
				</div>

				<div class="col-md-3">

					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Upload Photo</h3>
						</div>					
						<div class="panel-body">
							<form class="dropzone" 
								id="uploadPhotoForm" 
								action="{{ route('admin.slides.photos.upload') }}">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}
							</form>
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>


@endsection