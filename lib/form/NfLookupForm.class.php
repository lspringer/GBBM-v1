<?php

/**
 * Login form base class.
 * Simple form to handle logins	
 * @package    form
 * @subpackage user
 * @author lspringer
 */
class NfLookupForm extends BaseFormDoctrine
{
  public function configure()
  {
    
    $this->widgetSchema['term'] = new sfWidgetFormInput();
    $this->validatorSchema['term'] = new sfValidatorString(array('max_length' => 255, 'min_length' => 2));
    
    $this->widgetSchema->setNameFormat('nf[%s]');
  }

  public function getModelName()
  {
    return 'Movie';
  }
}
