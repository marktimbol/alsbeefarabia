//app.js

new WOW().init();

$(document).ready(function() {

	$('li.dropdown').on('mouseover', function() {
		$('ul.submenu').slideDown();
	});

	$('ul.submenu').on('mouseleave', function() {
		$(this).slideUp();
	});		

	$('li.dropdown').on('mouseleave', function() {
		$('ul.submenu').slideUp();
	});	

});