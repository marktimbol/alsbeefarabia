@extends('admin.layout.admin')

@section('pageTitle', 'Edit Slide')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Edit Slide</h1>	
			<div class="row">	
				<div class="col-md-9">
					<form method="POST"
						action="{{ route('admin.slides.update', $slide->id) }}">

						{!! csrf_field() !!}

						{!! method_field('PUT') !!}

						@include('errors.form')

						<div class="form-group">

							<div class="form-group">
								<label for="link">Link</label>
								<input type="text" 
									name="link" 
									id="link" 
									class="form-control" 
									placeholder="Paste your link here"
									value="{{ $slide->link }}"
									required />
							</div>

							
							<hr />

							<div class="form-group">
								<button type="submit" class="btn btn-primary">Update Record</button>
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
							<form class="dropzone" id="uploadPhotoForm" action="{{ route('admin.slides.photos.upload') }}">
								{!! csrf_field() !!}
								{!! method_field('PUT') !!}
								<input type="hidden" name="slide_id" value="{{ $slide->id }}" />
							</form>
						</div>
					</div>
				</div>	
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
@endsection