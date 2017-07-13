<?php 
	if ($item != null) {
		$id = $item->id;
		$image = $item->getImageTag();
		$title = $item->title;
		$text = $item->getLightInfos();
		$button = '<span class="btn btn-danger remove-highlight bg-grey-hover" data-position="'.$position.'">Retirer de la une</span>';
	} else {
		$id = 0;
		$image = '<img src="'.base_url().'assets/img/cover/unknown.png" alt="" class="img-fluid" />';
		$title = 'Emplacement vide';
		$text = '<em>Positionner une oeuvre ici</em>';
		$button = '<span class="btn btn-info add-highlight bg-green-hover" data-position="'.$position.'">Ajouter à la une</span>';
	}
?>

<span class="item-id" data-value="<?php echo $id; ?>"></span>
<div class="view overlay hm-zoom">
	<?php echo $image; ?>
	<a><div class="mask waves-effect waves-light"></div></a>
</div>
<div class="card-block">
	<h4 class="card-title brown-color"><b><?php echo $title; ?></b></h4>
	<p class="card-text"><em><?php echo $text; ?></em></p>
	<?php echo $button; ?>
</div>