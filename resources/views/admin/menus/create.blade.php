@extends('admin.layout.admin')

@section('pageTitle', 'Add New Menu')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Add New Menu</h1>
			

			<div class="row">
				<form method="POST"
					id="AddNewMenuForm"
					action="{{ route('admin.menus.store') }}"
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
								<textarea name="description" id="description" class="form-control ckeditor" rows="10">
									{{ old('description') }}
								</textarea>
							</div>		

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="price">Price <span class="required">*</span></label>
										<div class="input-group">
											<input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" size="10" required />
											<span class="input-group-addon">AED</span>
										</div>
									</div>
								</div>
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
								<h3 class="panel-title">Categories</h3>
							</div>					
							<div class="panel-body">
								<ul class="no-padding">							
									@foreach( $categories as $category ) 
									<li>
										<div class="radio">
											<label>
												<input type="radio" name="category" 
														value="{{ $category->id }}"
														{{ $category->id == '1' ? 'checked' : '' }} />
												{{ $category->name }}
											</label>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Image</h3>
							</div>					
							<div class="panel-body">
								
								<img src="" class="featured-image img-responsive" />

								<a href="#" data-toggle="modal" data-target="#uploadPhotoFormModal">
									Upload Photo
								</a>
							</div>
						</div>
					</div>
				</form>

				<div class="modal fade" id="uploadPhotoFormModal" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title">Upload Photo</h4>
							</div>
							<div class="modal-body">
								<form class="dropzone" id="uploadPhotoForm" action="{{ route('admin.menus.photos.upload') }}">
									{!! csrf_field() !!}
									{!! method_field('PUT') !!}
								</form>
							</div>
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