<?php

/**
 * Brewery filter form.
 *
 * @package    filters
 * @subpackage Brewery *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BreweryFormFilter extends BaseBreweryFormFilter
{
  public function configure()
  {
  	$this->widgetSchema['country'] = new sfWidgetFormI18nSelectCountry(array('culture' => sfDoctrineRecord::getDefaultCulture(), 'add_empty' => true));
  	$this->validatorSchema['country'] = new sfValidatorI18nChoiceCountry(array('required' => false));
  }

  public function getFields()
  {
    $fields = parent::getFields();
    $fields['country'] = 'ForeignKey';
    return $fields;
  }
}
