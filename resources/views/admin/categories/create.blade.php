@extends('admin.layout.admin')

@section('pageTitle', 'Add New Category')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>
				Add New Category
			</h1>	
			<div class="row">	

				<form method="POST"
					id="addNewCategoryForm"
					action="{{ route('admin.categories.store') }}"
					enctype="multipart/form-data">

					{!! csrf_field() !!}	
							
					<div class="col-md-9">


						@include('errors.form')

						<div class="form-group">

							<div class="form-group">
								<label for="name">Name <span class="required">*</span></label>
								<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required />
							</div>

							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description" id="description" class="ckeditor" rows="10">
									{{ old('description') }}
								</textarea>
							</div>		


							<hr />

							<div class="form-group">
								<button type="submit" class="btn btn-primary">Save Record</button>
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