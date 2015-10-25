@extends('admin.layout.admin')

@section('pageTitle', 'Add New Slide')

@section('content')
	<div class="row">
		<div class="col-md-12">
		
			<h1>Add New Slide</h1>	

			<div class="row">

				<form method="POST"
					action="{{ route('admin.slides.store') }}">

					{!! csrf_field() !!}

					<div class="col-md-9">

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
						</div>
						
					</div>

					<div class="col-md-3">

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Set Featured Image</h3>
							</div>					
							<div class="panel-body">
								<div id="featuredImageContainer"></div>
								<div class="text-center">
									<button type="button" class="btn" onclick="BrowseServer('featuredImage');">Browse Image</button>
								</div>
								<input type="hidden" name="featuredImage" id="featuredImage" />
							</div>
						</div>
					</div>	

					<div class="col-md-12">
					
						<hr />

						<div class="form-group">
							<button type="submit" class="btn btn-primary">Save Record</button>
						</div>	
					</div>
				</form>				
			</div>
		</div>
	</div>


@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/filemanager.js') }}"></script>
@endsection