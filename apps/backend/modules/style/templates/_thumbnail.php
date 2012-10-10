<?php if(!empty($form->getObject()->image)): ?>
<img src="<?php echo Tools::getThumbnail($form->getObject()->image, 110, 147) ?>" />
<?php endif ?>