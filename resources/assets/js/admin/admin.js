$(document).ready(function() {

	$('.select-categories input').on('click', function() {

		$('#hidden_category_id').val($(this).val());

	});

});

