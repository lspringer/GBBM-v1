<?php

/**
 * Login form base class.
 * Simple form to handle logins	
 * @package    form
 * @subpackage user
 * @author lspringer
 */
class LoginForm extends BaseFormDoctrine
{
  public function configure()
  {
    
    $this->widgetSchema['username'] = new sfWidgetFormInput();
    $this->validatorSchema['username'] = new sfValidatorString(array('max_length' => 45));
    
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 32));

    $this->widgetSchema->setNameFormat('user[%s]');
	
    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
    
    $this->validatorSchema->setPostValidator(
    	new sfValidatorUserLogin()
    );
  }

  public function getModelName()
  {
    return 'User';
  }
}
