<?php if(!empty($form->getObject()->image)): ?>
	<?php if(strpos($form->getObject()->image, 'http') === 0): ?>
	<img src="<?php echo $form->getObject()->image ?>" />
	<?php else: ?>
	<img src="<?php echo Tools::getThumbnail($form->getObject()->image, 110, 147) ?>" />
	<?php endif ?>
<?php endif ?>