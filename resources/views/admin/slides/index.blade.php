@extends('admin.layout.admin')

@section('pageTitle', 'Slides')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>
				Slides
				<a href="{{ route('admin.slides.create') }}" class="btn btn-default float-right">
					<i class="fa fa-plus"></i>
					Add New
				</a>
			</h1>	

			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Link</th>
					<th></th>
				</thead>
				<tbody>
					@forelse($slides as $slide)
					<tr>
						<td width="100">

							{!! display($slide->photos) !!}

						</td>

						<td>
							<a href="{{ $slide->link }}" target="_blank">{!! $slide->link !!}</a>
						</td>

						
						<td>
							<p class="text-right">

								<form
									class="align-right"
									method="POST"
									action="{{ route('admin.slides.destroy', $slide->id) }}">
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}

									<a href="{{ route('admin.slides.edit', $slide->id) }}"
										class="btn btn-default">
										Edit
									</a>

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
