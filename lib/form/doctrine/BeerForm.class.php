<?php

/**
 * Beer form.
 *
 * @package    form
 * @subpackage Beer
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class BeerForm extends BaseBeerForm
{
  public function configure()
  {
  	if($this->object->isNew())
  	{
  		$this->widgetSchema['author'] = new sfWidgetFormInputHidden();
  	}
  	else
  	{
  		$this->widgetSchema['author'] = new sfWidgetFormDoctrineChoice(array('model' => 'User', 'add_empty' => false), array('readonly' => 'readonly'));
  	}

  	$this->widgetSchema['uploader'] = new sfWidgetFormInputFile();
  	$this->validatorSchema['uploader'] = new sfValidatorFile(array(
  		'max_size' => 2500000, // 2.5MB
  		'mime_categories' => 'web_images',
  		'validated_file_class' => 'gbbmValidatedFile',
  		'required' => false,
  	));

  	$this->widgetSchema['brewery']->addOption('order_by',array('name', 'asc'));
  	$this->widgetSchema['style']->addOption('order_by',array('style', 'asc'));
  }
}