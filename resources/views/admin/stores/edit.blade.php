@extends('admin.layout.admin')

@section('pageTitle', 'Edit Store')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Edit Store</h1>	
			<div class="row">	

				<form method="POST"
					action="{{ route('admin.stores.update', $store->id) }}">

					{!! csrf_field() !!}

					{!! method_field('PUT') !!}		
						
					<div class="col-md-9">

						@include('errors.form')

						<div class="form-group">
							<label for="name">Name <span class="required">*</span></label>
							<input type="text" name="name" id="name" class="form-control" value="{{ $store->name }}" required />
						</div>

						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="description" class="ckeditor" rows="10">
								{{ $store->description }}
							</textarea>
						</div>	

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" name="address" id="address" class="form-control" value="{{ $store->address }}"/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="contact">Contact</label>
									<input type="text" name="contact" id="contact" class="form-control" value="{{ $store->contact }}"/>
								</div>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="latitude">Latitude</label>
									<input type="text" name="latitude" id="latitude" class="form-control" value="{{ $store->latitude }}"/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="longitude">Longitude</label>
									<input type="text" name="longitude" id="longitude" class="form-control" value="{{ $store->longitude }}"/>
								</div>
							</div>
						</div>														
					</div>

					<div class="col-md-3">

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Set Featured Image</h3>
							</div>					
							<div class="panel-body">
								<div id="featuredImageContainer">
									{!! display($store->photos) !!}
								</div>
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
							<button type="submit" class="btn btn-primary">Update Record</button>
						</div>	
					</div>

				</form>
			</div>
		</div>
	</div>


@endsection

@section('footer_scripts')
	<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
	<script>
		CKEDITOR.config.toolbar = [
		   ['Styles','Format','Font','FontSize'],
		
		   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],

		   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		   ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
		] ;
	</script>

	<script src="{{ elixir('js/filemanager.js') }}"></script>
@endsection