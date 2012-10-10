<?php

/**
 * FeaturedPair form.
 *
 * @package    form
 * @subpackage FeaturedPair
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class FeaturedPairForm extends BaseFeaturedPairForm
{
  public function configure()
  {
  	$this->widgetSchema['beer_id']->addOption('order_by', array('label', 'asc'));
  	$this->widgetSchema['movie_id']->addOption('order_by', array('title', 'asc'));
  }
}