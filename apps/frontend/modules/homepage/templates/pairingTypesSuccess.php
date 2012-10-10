<?php $sf_response->setTitle('GBBM: Create Your Own Pairing Step 1') ?>
<div class="col2 clearfix">
	<form id="pairing" method="POST">
		<?php echo $form->renderGlobalErrors() ?>
		<?php echo $form->renderHiddenFields() ?>
		<h2>Step 1: Tell us what kind of Beer and Movies you like</h2>
		<div id="beer" class="colBeer">
			<?php echo $form['style']->renderError() ?>
			<?php echo $form['style']->renderLabel('Pick one or more Beer styles', array('class' => 'labelHeader')) ?>
			<?php echo $form['style']->render() ?>
		</div>
		<div id="movie" class="colMovie last">
			<?php echo $form['genre']->renderError() ?>
			<?php echo $form['genre']->renderLabel('Pick one or more Movie genres', array('class' => 'labelHeader')) ?>
			<?php echo $form['genre']->render() ?>
		</div>
	<input id="pickerBtn" type="submit" value="DONE" />
	</form>
</div>