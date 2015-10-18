@extends('admin.layout.admin')

@section('pageTitle', 'Categories')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>
				Categories
				<a href="{{ route('admin.categories.create') }}" class="btn btn-default float-right">
					<i class="fa fa-plus"></i>
					Add New
				</a>
			</h1>	

			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Menu</th>
					<th></th>
				</thead>
				<tbody>
					@forelse($categories as $category)
					<tr>
						<td width="100">

							{!! display($category->photos) !!}

						</td>

						<td width="">
							<h4>
								<a href="{{ route('admin.categories.edit', $category->id) }}">
									{{ $category->name }}
								</a>
							</h4>
							{!! str_limit($category->description, 150) !!}
						</td>
						<td>
							<p class="text-right">
								<form
									class="align-right"
									method="POST"
									action="{{ route('admin.categories.destroy', $category->id) }}">
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}

									<button type="submit" class="btn btn-sm btn-danger">
										<i class="fa fa-trash"></i> Delete
									</button>									
								</form>

							</p>
						</td>
					</tr>
					@empty
						<tr>
							<td>No Record.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection
