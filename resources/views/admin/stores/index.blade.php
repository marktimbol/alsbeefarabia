@extends('admin.layout.admin')

@section('pageTitle', 'Stores')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>
				Stores
				<a href="{{ route('admin.stores.create') }}" class="btn btn-default float-right">
					<i class="fa fa-plus"></i>
					Add New
				</a>
			</h1>	

			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Store</th>
					<th></th>
				</thead>
				<tbody>
					@forelse($stores as $store)
					<tr>
						<td width="100">

							{!! display($store->photos) !!}

						</td>

						<td width="">
							<h4>
								<a href="{{ route('admin.stores.edit', $store->id) }}">
									{{ $store->name }}
								</a>
							</h4>
							{!! str_limit($store->description, 150) !!}
						</td>
						<td>
							<p class="text-right">
								<form
									class="align-right"
									method="POST"
									action="{{ route('admin.stores.destroy', $store->id) }}">
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
