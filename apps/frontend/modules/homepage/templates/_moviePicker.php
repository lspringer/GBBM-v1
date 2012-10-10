<h3>We have <?php echo $moviePager->getNbResults() ?> Movies, this is #<?php echo $moviePager->getPage() ?></h3>
<?php include_partial('global/movie', array('movie' => $object)) ?>
<input id="movieId" type="hidden" value="<?php echo $object->id ?>" />
<ul class="pickerPag">
	<?php if($moviePager->getPage() > $moviePager->getPreviousPage()): ?>
	<li class="prev"><a href="<?php echo url_for('ajax/moviePicker?moviePage='.$moviePager->getPreviousPage()) ?>" title="Previous Beer">&laquo; Previous Movie</a></li>
	<?php endif ?>
	<?php if($moviePager->getPage() < $moviePager->getNextPage()): ?>
	<li class="next"><a href="<?php echo url_for('ajax/moviePicker?moviePage='.$moviePager->getNextPage()) ?>" title="Next Beer">Next Movie &raquo;</a></li>
	<?php endif ?>
</ul>