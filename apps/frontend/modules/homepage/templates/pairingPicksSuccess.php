<?php $sf_response->setTitle('GBBM: Create Your Own Pairing Step 2') ?>
<div class="col2 clearfix">
		<h2>Step 2: Now pick your poisons</h2>
		<form action="<?php echo url_for('@pairingTypes') ?>" method="POST">
		<div id="beer" class="colBeer">
			<?php include_component('homepage', 'beerPicker') ?>
		</div>
		<div id="movie" class="colMovie last">
			<?php include_component('homepage', 'moviePicker') ?>
		</div>
			<input id="backBtn" type="submit" value="BACK" />
			<input id="pickerBtn" class="complete" type="button" value="DONE" />
		</form>
</div>