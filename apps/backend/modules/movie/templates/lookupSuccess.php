<h1>Ask and you shall receive</h1>
<div style="padding:25px;">
	<form action="<?php echo url_for('movie/lookup') ?>" method="POST">
		<?php echo $form ?>
	<input type="submit" value="Ahoy!" />
	</form>
</div>
<?php if(isset($results)): ?>
		<?php foreach($results as $movie): ?>
			<?php include_partial('global/movie', array('movie' => $movie)); ?>
		<?php endforeach; ?>
<?php endif; ?>