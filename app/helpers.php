<?php

function flash($title = null, $message = null)
{
	$flash = app('App\Http\Flash');
	if( func_num_args() == 0 )
	{
		return $flash;
	}

	return $flash->info($title, $message);
}


function display($photos, $location = '') {

	if( count($photos) > 0 ) {

		$html = '';

		foreach( $photos as $photo ) {

			if( $location == 'home' ) {
				
				$html .= '<div class="item">';

				$html .= '<a href="'. $photo->imageable->link .'">';

			}

				$html .= '<img src="'. asset('/images/uploads/'.$photo->path) .'" 
						alt="'.$photo->imageable->name .'" 
						title="'.$photo->imageable->name.'" 
						class="img-responsive" />';

			if( $location == 'home' ) {
				
				$html .= '</a>';

				$html .= '</div>';

			}

			return $html;
		}

	} else {

		return defaultImage();

	}

}

function getPhoto($filename, $title = "Al's Beef Arabia") {

	if( ! empty($filename) ) {

		return '<img src="'.asset('images/'. $filename).'" 
					alt="'. $title.'" 
					title="'.$title .'"
					class="img-responsive" />';

	} else {

		return defaultImage($title);

	}

}

function defaultImage($title = "Al's Beef Arabia") {

	return '<img src="'.asset('/images/default.png').'" 
				alt="'. $title.'" 
				title="'.$title .'" 
				class="img-responsive" />';

}

