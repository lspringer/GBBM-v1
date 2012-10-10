<?php

/**
 * FeaturedPair filter form.
 *
 * @package    filters
 * @subpackage FeaturedPair *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class FeaturedPairFormFilter extends BaseFeaturedPairFormFilter
{
  public function configure()
  {
  	$this->widgetSchema['beer_id']->addOption('order_by', array('label', 'asc'));
  	$this->widgetSchema['movie_id']->addOption('order_by', array('title', 'asc'));
  }
}