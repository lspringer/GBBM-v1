<?php $sf_response->setTitle('GBBM: '. $movie->title . 'was added to your Netflix queue!') ?>
<div class="clearfix">
	<h3><a href="<?php echo $movie->nflink ?>" title="<?php echo $movie->title ?>" target="_new"><?php echo $movie->title ?> was added to your Netflix queue!</a></h3>
</div> <!-- end colThree -->