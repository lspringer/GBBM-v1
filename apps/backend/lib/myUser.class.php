<?php

class myUser extends sfBasicSecurityUser
{
	/**
	* Login user function
	* @param int $user_id
	* @param bool $persist
	*/
	public function login(User $user, $persist = FALSE)
	{
		// Check authentication role
		if($user->id && $user->role != User::DISABLED_ROLE)
		{
			// Clear current credentials
			$this->clearCredentials();
			
			// Set authentication session flag
			$this->setAuthenticated(TRUE);
			
			// Add credentials and attributes for all users
			$this->addCredential($user->role);
			$this->setAttribute('user_id', $user->id);
			$this->setAttribute('username', $user->username);
			
			// Get response object
			$response = sfContext::getInstance()->getResponse();
			$response->setCookie('gbbmbe', Tools::createToken(), 0, '/');
			
			if($persist)
			{
				// Set a user token
				$user->token = Tools::createToken();

				// Set Cookie for 30 days
				$response->setCookie('rememberMe', $user->token, strtotime('+30 days'), '/');
			}
		}
	}
	
	/**
	* user logout function
	*/
	public function logout()
	{
		// Clean the session
  	$this->cleanSession();
  	
  	// Additional logic may happen here such as token cleanup or forcing another account's login
	}
	
	/**
	* Clean session function
	*/
	public function cleanSession()
	{
		// Clear credentials and session
  	$this->clearCredentials();
  	$this->setAuthenticated(FALSE);
  	$this->getAttributeHolder()->clear();
  	
  	// Get response object
		$response = sfContext::getInstance()->getResponse();
		$response->setCookie('gbbmbe', Tools::createToken(), strtotime('-1 day'), '/');
	}
	
	public function getCredential()
	{
		$c = $this->listCredentials();
		return array_shift($c);
	}
}
