<?php
	$full = intval($grades);

	for ($i = 0; $i < $full; $i++) { 
		echo '<i class="grade fa fa-star" data-value="'.($i + 1).'" data-base="fa-star"></i>';
	}

	if (($grades - $full) != 0) {
		echo '<i class="grade fa fa-star-half-o" data-value="'.($full + 1).'" data-base="fa-star-half-o"></i>';
		$full += 1;
	}

	for ($i = $full; $i < 5; $i++) { 
		echo '<i class="grade fa fa-star-o" data-value="'.($i + 1).'" data-base="fa-star-o"></i>';
	}
?>