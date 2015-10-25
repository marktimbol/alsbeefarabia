@extends('admin.layout.admin')

@section('pageTitle', 'Edit Slide')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Edit Slide</h1>	
			<div class="row">	
				<form method="POST"
					action="{{ route('admin.slides.update', $slide->id) }}">

					{!! csrf_field() !!}

					{!! method_field('PUT') !!}

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
									value="{{ $slide->link }}"
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
								<div id="featuredImageContainer">
									{!! display($slide->photos) !!}
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