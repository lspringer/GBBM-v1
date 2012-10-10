<?php

/**
 * Brewery form.
 *
 * @package    form
 * @subpackage Brewery
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class BreweryForm extends BaseBreweryForm
{
  public function configure()
  {
  	$this->widgetSchema['country'] = new sfWidgetFormI18nSelectCountry(array('culture' => sfDoctrineRecord::getDefaultCulture()));
  	$this->validatorSchema['country'] = new sfValidatorI18nChoiceCountry();
  	
  	$this->widgetSchema['uploader'] = new sfWidgetFormInputFile();
  	$this->validatorSchema['uploader'] = new sfValidatorFile(array(
  		'max_size' => 100000, 
  		'mime_categories' => 'web_images',
  		'validated_file_class' => 'gbbmValidatedFile',
  		'required' => false,
  	));
  }
}