<?php $i = 0; foreach($form->getObject()->Genres as $genre): $i++; ?>
<div class="sf_admin_form_row">
	<div>
		<label><?php echo $i ?></label> <?php echo $genre->genre ?>
	</div>
</div>
<?php endforeach ?>