<?php

/**
 * Movie filter form.
 *
 * @package    filters
 * @subpackage Movie *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class MovieFormFilter extends BaseMovieFormFilter
{
  public function configure()
  {
  	$years = Tools::yearSelect();
  	$this->widgetSchema['year'] = new sfWidgetFormSelect(array('choices' => $years));
  	$this->validatorSchema['year'] = new sfValidatorChoice(array('choices' => array_keys($years), 'required' => false));
  }
}