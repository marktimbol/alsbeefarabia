@extends('admin.layout.admin')

@section('pageTitle', 'Menus')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>
				Menus
				<a href="{{ route('admin.menus.create') }}" class="btn btn-default float-right">
					<i class="fa fa-plus"></i>
					Add New
				</a>
			</h1>

			<table class="table table-hover">
				
				<thead>
					<th>Image</th>
					<th>Menu</th>
					<th>Category</th>
					<th>Price (AED)</th>
					<th></th>
				</thead>

				<tbody>
					@forelse($menus as $menu)
					<tr>
						<td width="100">

							{!! display($menu->photos) !!}
						
						</td>

						<td>
							<h4>
								<a href="{{ route('admin.menus.edit', $menu->id) }}">
									{{ $menu->name }}
								</a>
							</h4>
						</td>
						<td>{{ $menu->categories->name }}</td>
						<td>{{ $menu->price }}</td>
						<td>
							<p class="text-right">
								<form
									class="align-right"
									method="POST"
									action="{{ route('admin.menus.destroy', $menu->id) }}">
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

			{!! $menus->render() !!}
			
		</div>

@endsection

@section('footer_scripts')

@endsection