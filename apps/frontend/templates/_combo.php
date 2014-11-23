<?php if(!empty($combo->meta)): ?>
<h2>This pairing brought to you by <?php echo $combo->meta ?></h2>
<?php else: ?>
<h2>This pairing brought to you by unknown mystical forces</h2>
<?php endif ?>
<div id="beer" class="colBeer">
	<?php include_partial('global/beer', array('beer' => $combo->beer, 'movieId' => $combo->movie->id)) ?>
	<ul class="comboActions">
		<li><a href="<?php echo $combo->beer->getShopLink() ?>" target="_new">Try to Find this Beer!</a></li>
	</ul>
</div>

<div id="movie" class="colMovie last">
	<?php include_partial('global/movie', array('movie' => $combo->movie, 'beerId' => $combo->beer->id)) ?>
</div>
