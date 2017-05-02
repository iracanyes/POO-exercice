<?php ob_start() ?>

<div class="home_bloc_3 over_flow">
	<?php foreach($categories as $cat ) : ?>
		<div class="fl hb_3">
			<div class="hb_3_rond_1"><p><?php echo $cat->getProjet_categorie_id(); ?></p></div>
			<h2><?php echo $cat->getCategorie(); ?></h2>
			<p><?php echo $cat->getDescription(); ?></p>
		</div>
	<?php endforeach; ?>
</div>

