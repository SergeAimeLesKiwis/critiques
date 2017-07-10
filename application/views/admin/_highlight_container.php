<?php 
	if ($item != null) {
		$id = $item->id;
		$image = $item->getImageTag();
		$title = $item->title;
		$text = $item->getLightInfos();
		$button = '<span class="btn btn-danger remove-highlight" data-position="'.$position.'">Retirer de la une</span>';
	} else {
		$id = 0;
		$image = '<img src="'.base_url().'assets/img/cover/unknown.png" alt="" class="img-fluid" />';
		$title = '';
		$text = '';
		$button = '<span class="btn btn-info add-highlight" data-position="'.$position.'">Ajouter à la une</span>';
	}
?>

<span class="item-id" data-value="<?php echo $id; ?>"></span>
<div class="view overlay hm-zoom">
	<?php echo $image; ?>
	<a><div class="mask waves-effect waves-light"></div></a>
</div>
<div class="card-block">
	<h4 class="card-title"><?php echo $title; ?></h4>
	<p class="card-text"><?php echo $text; ?></p>
	<?php echo $button; ?>
</div>