<?php

// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
$context = sfContext::createInstance($configuration);
if(!$context->getRequest()->getCookie('gbbmbe') && strpos($_SERVER['REQUEST_URI'], 'frontend_dev') !== FALSE)
{
	header('Location: http://goodbeerbadmovie.com');
	die;
}
$context->dispatch();
