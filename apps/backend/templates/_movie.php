<div>
	<?php echo image_tag($movie['image']) ?>
	<h2><?php echo link_to($movie['title'], $movie['link'], 'target="_new"') ?></h2>
	<ul class="movieDetail">
		<li class="sf_admin_action_new"><?php echo link_to('ADD ME', 'movie/new?m='.urlencode($movie['id'])) ?></li>
		<li>Released: <?php echo $movie['year'] ?></li>
		<li>Runtime: <?php echo $movie['runtime'] ?> minutes</li>
		<li>Average Rating: <?php echo $movie['rating'] ?></li>
	</ul>
	<p>
		<?php echo $movie['synopsis'] ?>
	</p>
</div>
<div style="padding:10px;height:1px;border-top: 1px solid #CDCDCD;">&nbsp;</div>