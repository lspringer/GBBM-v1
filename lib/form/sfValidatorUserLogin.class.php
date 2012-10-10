<?php

/**
* Post form class to check supplied login info against user table
*/
class sfValidatorUserLogin extends sfValidatorBase
{
	
  protected function configure($options = array(), $messages = array())
  {
  	$this->addOption('username', 'username');
    $this->addOption('password', 'password');
    
    $this->addMessage('invalid' , 'This username / password combination is incorrect');
    $this->addMessage('disabled' , 'This account is not active. To reactivate this account please contact a site administrator');
  }

  /**
   * function to clean and validate values
   */
  protected function doClean($values)
  {
  	if (is_null($values))
    {
      $values = array();
    }

    if (!is_array($values))
    {
      throw new InvalidArgumentException('You must pass an array to the clean() method');
    }

    $username  = (string) $values[$this->getOption('username')];
    $password = User::pwHash($values[$this->getOption('password')]);
    
  	$user = Doctrine::getTable('User')->findOneByUsername($username);
  	$pwcheck = ($user) ? $user->password : '';
  	
  	
  	// 1) Check if this user is suspended
    if($user && $user->role == User::DISABLED_ROLE)
    {
    	$error = new sfValidatorError($this, 'disabled', array('username' => $username, 'password' => $password));
    }
    // 2) Check that we have a valid user and the passwords match
    elseif(!$user || strcmp($pwcheck, $password) !== 0)
    {
    	$error = new sfValidatorError($this, 'invalid', array('username' => $username, 'password' => $password));
    }
    
    // Throw the error
    if(isset($error))
    {
    	if ($this->getOption('throw_global_error'))
      {
        throw $error;
      }

      throw new sfValidatorErrorSchema($this, array($this->getOption('username') => $error));
    }

    return $values;
  }
}
