<h2>Login</h2>
<p>
	Enter your username and password for access.
</p>
<form action="<?php echo url_for('security/login') ?>" method="POST">
<p>
	<?php echo $form ?>
</p>
<p>
	<input type="submit" />
</p>
</form>