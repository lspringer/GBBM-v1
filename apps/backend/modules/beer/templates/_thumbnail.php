<?php if(!empty($form->getObject()->image)): ?>
<img src="<?php echo Tools::getThumbnail($form->getObject()->image, 284, 405, 'canvas') ?>" />
<?php endif ?>