@extends('admin.layout.admin')

@section('pageTitle', 'File Manager')

@section('header_styles')
	<link rel="stylesheet" href="{{url('/')}}/bower_components/filemanager-ui/dist/css/filemanager-ui.css">
@endsection

@section('content')

	<div class="row">
		<div class="col-md-12">

			<hr />
			
			<h1></h1>

			<div id="filemanager1" class="filemanager"></div>
		
		</div>
	</div>
@endsection

@section('footer_scripts')
    <script src="{{ url('/') }}/bower_components/filemanager-ui/dist/js/filemanager-ui.min.js"></script>   
    <script type="text/javascript">
        $(function() {
            $("#filemanager1").filemanager({
                url: '{{ url("/") }}/admin/filemanager/connection',
                languaje: "US",
                upload_max: 5,
                views: 'thumbs',
                insertButton: true,
                token: "{{ csrf_token() }}"
            });
        });
    </script>
@endsection