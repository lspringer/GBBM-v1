<h3>We have <?php echo $beerPager->getNbResults() ?> Beers, this is #<?php echo $beerPager->getPage() ?></h3>
<?php include_partial('global/beer', array('beer' => $object)) ?>
<ul class="pickerPag">
	<?php if($beerPager->getPage() > $beerPager->getPreviousPage()): ?>
	<li class="prev"><a href="<?php echo url_for('ajax/beerPicker?beerPage='.$beerPager->getPreviousPage()) ?>" title="Previous Beer">&laquo; Previous Beer</a></li>
	<?php endif ?>
	<?php if($beerPager->getPage() < $beerPager->getNextPage()): ?>
	<li class="next"><a href="<?php echo url_for('ajax/beerPicker?beerPage='.$beerPager->getNextPage()) ?>" title="Next Beer">Next Beer &raquo;</a></li>
	<?php endif ?>
</ul>
<input id="beerId" type="hidden" value="<?php echo $object->id ?>" />