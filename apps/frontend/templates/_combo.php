<?php if(!empty($combo->meta)): ?>
<h2>This pairing brought to you by <?php echo $combo->meta ?></h2>
<?php else: ?>
<h2>This pairing brought to you by unknown mystical forces</h2>
<?php endif ?>
<div id="beer" class="colBeer">
	<?php include_partial('global/beer', array('beer' => $combo->beer, 'movieId' => $combo->movie->id)) ?>
	<ul class="comboActions">
		<li><a href="<?php echo $combo->beer->getShopLink() ?>" target="_new">Find this Beer!</a></li>
	</ul>
</div>

<div id="movie" class="colMovie last">
	<?php include_partial('global/movie', array('movie' => $combo->movie, 'beerId' => $combo->beer->id)) ?>
	<ul class="comboActions">
	<?php if($sf_user->isAuthenticated()): ?>
		<li><a href="<?php echo url_for('@add_movie?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id.'&queue='.Netflix::DISC_QUEUE) ?>" title="Add to queue">Add to your Netflix DVD Queue</a></li>
		<?php if(in_array(Netflix::INSTANT_QUEUE, $combo->nfData['format_array'])): ?>
		<li><a href="<?php echo url_for('@add_movie?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id.'&queue='.Netflix::INSTANT_QUEUE) ?>" title="Add to queue">Add to your Netflix Instant Queue</a></li>
		<li><a href="<?php echo Netflix::getPlayerLink($combo->nfData['id']) ?>">Watch it NOW!</li>
		<?php endif ?>
	<?php else: ?>
		<li><a href="<?php echo url_for('@login?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id.'&queue='.Netflix::DISC_QUEUE) ?>" title="Add to queue">Add to your Netflix DVD Queue</a></li>
		<?php if(in_array(Netflix::INSTANT_QUEUE, $combo->nfData['format_array'])): ?>
		<li><a href="<?php echo url_for('@login?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id.'&queue='.Netflix::INSTANT_QUEUE) ?>" title="Add to queue">Add to your Netflix Instant Queue</a></li>
		<li><a href="<?php echo url_for('@login?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id.'&queue='.Netflix::NO_QUEUE) ?>" title="Add to queue">Watch it NOW!</a></li>
		<?php endif ?>
	<?php endif ?>
</div>
