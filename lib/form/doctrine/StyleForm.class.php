<?php

/**
 * Style form.
 *
 * @package    form
 * @subpackage Style
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class StyleForm extends BaseStyleForm
{
  public function configure()
  {
  	$this->widgetSchema['uploader'] = new sfWidgetFormInputFile();
  	$this->validatorSchema['uploader'] = new sfValidatorFile(array(
  		'max_size' => 100000, 
  		'mime_categories' => 'web_images',
  		'validated_file_class' => 'gbbmValidatedFile',
  		'required' => false,
  	));
  }
}