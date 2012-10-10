<?php

/**
 * Beer filter form.
 *
 * @package    filters
 * @subpackage Beer *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BeerFormFilter extends BaseBeerFormFilter
{
  public function configure()
  {
  	$this->widgetSchema['brewery']->addOption('order_by',array('name', 'asc'));
  	$this->widgetSchema['style']->addOption('order_by',array('style', 'asc'));
  }
}