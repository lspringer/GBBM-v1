<!DOCTYPE html>
<html>
<head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>

	<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" href="/css/global.css" type="text/css" media="screen, projection" />
	<!--[if lt IE 9]>
			<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript" charset="utf-8">
google.load("jquery", "1.5.2");
google.load("jqueryui", "1.8.11");
</script>
<?php if(has_slot('header')) echo get_slot('header') ?>
</head>
<body>
	<div id="wrapper">
		<header>
			<a href="/" class="logo">Good Beer, Bad Movie</a>
			<form name="randomizer" action="<?php echo url_for('@homepage') ?>" method="POST">
				<fieldset>
					<div>
						<input type="submit" value="PAIR 'EM UP" class="btnHitme" id="btnHitMe" />
					</div>
				</fieldset>
			</form>
			<ul id="navlist">
                <li><a href="<?php echo url_for('@pairingTypes') ?>" title="Create a pairing">Make a pairing</a></li>
				<li><a href="<?php echo url_for('@about') ?>" title="About GBBM">About</a></li>
			</ul>
		</header>
		<section id="content">
			 <?php echo $sf_content ?>
		</section>
		<footer>
			<a href="http://www.netflix.com" title="Delivered by Netflix"><img src="/images/shared/delivered-by-netflix.png" alt="Delivered by Netflix" width="150" height="65" /></a>
			<br /><a href="<?php echo url_for('@privacy') ?>" title="Privacy Policy">GBBM Privacy Policy</a>
		</footer>
	</div>
<script type="text/javascript" src="/js/global.js"></script>
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-274358-3");
	pageTracker._trackPageview();
	} catch(err) {}</script>
</body>
