<ul class="beer">
<?php if($beer->image): ?>
	<li class="image"><img src="<?php echo Tools::getThumbnail($beer->image,284,405, 'canvas') ?>" alt="<?php echo $beer->label ?>" />
<?php endif; ?>
	<li><h3><a href="<?php echo $beer->getShopLink() ?>" target="_new"><?php echo $beer->label ?></a></h3></li>
	<li>
		<dl>
			<dt>Style:</dt>
			<dd><?php echo $beer->Style ?></dd>
			<dt>Brewery:</dt>
			<dd><?php echo $beer->Brewery ?></dd>
			<?php /*
			<dt>Rating:</dt>
			<?php if(!empty($beer->rating)): ?>
			<dd><?php echo $beer->rating ?></dd>
			<?php else: ?>
			<dd>This beer is good! However, we have not quantified its happiness to a number yet.
			<?php endif ?>
			*/ ?>
		</dl>
	 </li>
</ul>
