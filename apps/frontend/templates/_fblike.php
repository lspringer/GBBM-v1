<?php slot('header') ?>
<link rel="image_src" href="/images/shared/logo.gif" />
<meta property="fb:app_id" content="156722391062037">
<meta property="og:site_name" content="Good Beer. Bad Movie.">
<meta property="og:type" content="gbbm:pairing"/>
<meta property="og:url" content="<?php echo $url ?>"/>
<meta property="og:title" content="<?php echo $title ?>"/>
<?php end_slot() ?>
<div id="fb-root" class="socialBtn">
</div>
<script src="http://connect.facebook.net/en_US/all.js#appId=156722391062037&amp;xfbml=1"></script>
<fb:like href="<?php echo $url ?>" send="true" layout="standard" width="450" show_faces="false" action="like" font="arial"></fb:like>
<?php /*
<div id="fb-root">
</div>
<fb:comments href="<?php echo $url ?>" num_posts="10" width="450"></fb:comments>
*/ ?>