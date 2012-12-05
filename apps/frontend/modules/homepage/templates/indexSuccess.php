<?php
	if($sf_request->getParameter('movie_id') && $sf_request->getParameter('beer_id'))
	{
		$sf_response->setTitle(sprintf('GBBM: Pairing %s with %s', $combo->beer->label, $combo->movie->title));
	}
	else
	{
		$sf_response->setTitle('GBBM: Good Beer. Bad Movie.');
	}
?>

<div class="col2 clearfix">
<?php include_partial('global/combo', array('combo' => $combo)) ?>
</div>

<div class="col2 clearfix mainCol socialCol">
	<h3>Share this pairing</h3>
	<?php
		include_partial('global/twitter', array(
			'url' => url_for('@share_movie?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id, TRUE),
			'title' => sprintf('GBBM: Pairing %s with %s', $combo->beer->label, $combo->movie->title),
		));
	?>
	<?php
		include_partial('global/gplus', array(
			'url' => url_for('@share_movie?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id, TRUE),
			'title' => sprintf('GBBM: Pairing %s with %s', $combo->beer->label, $combo->movie->title),
		));
	?>
 <?php include_partial('global/fblike', array(
                        'url' => url_for('@share_movie?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id, TRUE),
                        'title' => sprintf('GBBM: Pairing %s with %s', $combo->beer->label, $combo->movie->title),
                ));
        ?>

	<?php /*

		include_partial('global/disqus', array(
			'url' => url_for('@share_movie?movie_id='.$combo->movie->id.'&beer_id='.$combo->beer->id, TRUE),
			'uid' => $combo->movie->id.'_'.$combo->beer->id,
		));
*/	?>
</div>

<!-- end colThree -->
