<?php

/**
 * Login form base class.
 * Simple form to handle logins
 * @package    form
 * @subpackage user
 * @author lspringer
 */
class PairingTypesForm extends sfForm
{
  public function configure()
  {
		$this->widgetSchema['style'] = new sfWidgetFormDoctrineChoice(array(
			'model' => 'Style',
			'order_by' => array('style', 'ASC'),
			'multiple' => true,
			'expanded' => true,
		));
		$this->validatorSchema['style'] = new sfValidatorDoctrineChoiceMany(array(
			'model' => 'Style',
		));

		// Can't use Doctrine binding here
		$choices = Doctrine::getTable('Genre')->getDropDownArray();
		$this->widgetSchema['genre'] = new sfWidgetFormChoice(array(
			'choices' => $choices,
			'multiple' => TRUE,
			'expanded' => TRUE,
		));
		$this->validatorSchema['genre'] = new sfValidatorChoiceMany(array(
			'choices' => array_keys($choices),
		));

		$this->widgetSchema->setNameFormat('pairing[%s]');
  }
}
