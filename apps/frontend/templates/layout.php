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
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/ui/1.8.24/jquery-ui.min.js"
  integrity="sha256-UOoxwEUqhp5BSFFwqzyo2Qp4JLmYYPTHB8l+1yhZij8="
  crossorigin="anonymous"></script>
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
	<ul>
		<li>Curated by <a href="http://about.me/lee.springer">Lee Springer</a></li>	
			<li><a href="<?php echo url_for('@privacy') ?>" title="Privacy Policy">GBBM Privacy Policy</a></li>
		</ul>
		</footer>
	</div>
<script type="text/javascript" src="/js/global.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-274358-3']);
  _gaq.push(['_setDomainName', 'goodbeerbadmovie.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
