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

			if($persist)
			{
				// Get response object
				$response = sfContext::getInstance()->getResponse();

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

  	// Additional logic may happen here such as removal of cookies
	}

	public function getCredential()
	{
		$c = $this->listCredentials();
		return array_shift($c);
	}

	public function isAuthenticated()
	{
		if(sfContext::getInstance()->getRequest()->getCookie('nfs') &&
			sfContext::getInstance()->getRequest()->getCookie('nft') &&
			sfContext::getInstance()->getRequest()->getCookie('nfi'))
		{
			return TRUE;
		}
		return FALSE;
	}

	public function randomTracker($beerId, $movieId)
	{
		$bTracker = $this->getAttribute('bTracker', array());
		$mTracker = $this->getAttribute('mTracker', array());
		$bCount = count($bTracker);
		$mCount = count($mTracker);

		$max = Randomizer::TRACKING_MAX - 1;
		if($bCount > $max)
		{
			$bTracker = array_slice($bTracker, $bCount - $max, $max);
		}
		if($mCount > $max)
		{
			$mTracker = array_slice($mTracker, $mCount - $max, $max);
		}

		$bTracker[] = $beerId;
		$mTracker[] = $movieId;

		$this->setAttribute('bTracker', $bTracker);
		$this->setAttribute('mTracker', $mTracker);
	}
}
