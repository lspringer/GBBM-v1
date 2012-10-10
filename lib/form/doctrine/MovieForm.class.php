<?php

/**
 * Movie form.
 *
 * @package    form
 * @subpackage Movie
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class MovieForm extends BaseMovieForm
{
  public function configure()
  {
  	$years = Tools::yearSelect();
  	$this->widgetSchema['year'] = new sfWidgetFormSelect(array('choices' => $years));
  	$this->validatorSchema['year'] = new sfValidatorChoice(array('choices' => array_keys($years)));
  	
  	if($this->object->isNew())
  	{
  		$this->widgetSchema['author'] = new sfWidgetFormInputHidden();
  	}
  	else
  	{
  		$this->widgetSchema['author'] = new sfWidgetFormDoctrineChoice(array('model' => 'User', 'add_empty' => false), array('readonly' => 'readonly'));
  	}
  	
  	$this->widgetSchema['nfid'] = new sfWidgetFormInputHidden();
  	
  	$this->widgetSchema['nflink'] = new sfWidgetFormInputHidden();
  	
  	$this->widgetSchema['nfsimilar'] = new sfWidgetFormInputHidden();
  	
  	$this->widgetSchema['uploader'] = new sfWidgetFormInputFile();
  	$this->validatorSchema['uploader'] = new sfValidatorFile(array(
  		'max_size' => 100000, 
  		'mime_categories' => 'web_images',
  		'validated_file_class' => 'gbbmValidatedFile',
  		'required' => false,
  	));
  	
  	$this->validatorSchema['synopsis'] = new sfValidatorString(array('required' => false));
  }
}