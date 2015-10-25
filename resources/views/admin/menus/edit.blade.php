@extends('admin.layout.admin')

@section('pageTitle', 'Edit Menu')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Edit Menu</h1>	
			<div class="row">	
				<form method="POST"
					action="{{ route('admin.menus.update', $menu->id) }}"
					enctype="multipart/form-data">

					{!! csrf_field() !!}

					{!! method_field('PUT') !!}			
					
					<div class="col-md-9">

						@include('errors.form')

						<div class="form-group">

							<div class="form-group">
								<label for="name">Name <span class="required">*</span></label>
								<input type="text" name="name" id="name" class="form-control" value="{{ $menu->name }}" />
							</div>

							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description" id="description" class="ckeditor" rows="10">
									{{ $menu->description }}
								</textarea>
							</div>									
						</div>
					</div>

					<div class="col-md-3">

						<div class="panel panel-primary select-categories">
							<div class="panel-heading">
								<h3 class="panel-title">Categories</h3>
							</div>					
							<div class="panel-body">
								<ul class="no-padding">							
									@foreach( $categories as $category ) 
									<li>
										<div class="radio">
											<label>
												<input type="radio" name="category_id" 
														value="{{ $category->id }}" 
														{{ $menu->category_id === $category->id ? 'checked' : ''}} />
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
								<h3 class="panel-title">Set Featured Image</h3>
							</div>					
							<div class="panel-body">
								<div id="featuredImageContainer">
									{!! display($menu->photos) !!}
								</div>
								<div class="text-center">
									<button type="button" class="btn" onclick="BrowseServer('featuredImage');">Browse Image</button>
								</div>
								<input type="hidden" name="featuredImage" id="featuredImage" />
							</div>
						</div>
					</div>



					<div class="col-md-12">
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