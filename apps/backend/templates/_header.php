<div id="backendHeader">
	You are logged in as <?php echo $sf_user->getAttribute('username'); ?> with role of <?php echo $sf_user->getCredential(); ?>.
</div>
<ul class="dashboard">
	<li><?php echo link_to('Home', '@homepage')?></li>
	<li><?php echo link_to('User', '@user')?></li>
	<li>
		<?php echo link_to('Movie', '@movie')?>
	</li>
	<li>
		<?php echo link_to('Beer', '@beer')?>
		<ul>
			<li><?php echo link_to('Styles', '@style')?></li>
			<li><?php echo link_to('Brewery', '@brewery')?></li>
		</ul>
	</li>
	<li><?php echo link_to('Pairings', '@featured_pair') ?></li>
	<li class="last"><?php echo link_to('Logout', '@logout'); ?></li>
</ul>

