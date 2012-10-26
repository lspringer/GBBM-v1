<ul class="movie">
	<?php if($movie->image): ?>
		<li class="img"><img src="<?php echo $movie->image ?>" alt="<?php echo $movie->title ?>" /></li>
	<?php endif; ?>
	<li><h3><a href="<?php echo $movie->nflink ?>" title="<?php echo $movie->title ?>" target="_new"><?php echo $movie->title ?></a></h3></li>
	<li>
		<dl>
			<dt>Released:</dt><dd><?php echo $movie->year ?></dd>
			<dt>Runtime:</dt><dd><?php echo $movie->runtime ?> minutes</dd>
			<dt>Average Rating:</dt><dd><?php echo $movie->rating ?></dd>
		</dl>
	</li>
	<li class="synopsis"><?php echo $movie->synopsis ?></li>
</ul>

