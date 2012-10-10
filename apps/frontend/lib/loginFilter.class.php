<?php
 
class loginFilter extends sfFilter
{
	/**
	* A login filter chain that logs in the anon user on page load
	* This also checks to see if a remember me cookie has been set to auto login in a user
	* @param object sfFilter
	*/
	public function execute($filterChain)
	{ 
		if($this->isFirstCall())
		{
			// Get user object
			$userSession = $this->getContext()->getUser();
			$request = $this->getContext()->getRequest();
	  	// Apply this filter only if you are not currently logged in
			if(!$userSession->isAuthenticated())
			{
		  	// Look for a remember me cookie
		  	$cookieVal = $request->getCookie('rememberMe');
		  	if(!empty($cookieVal))
		    {
		      // Get user object
		      $user = Doctrine::getTable('User')->findOneByToken($cookieVal);
		    }
		    
		    $userSession->login($user, TRUE);
	  	}
	  }
  	
  	// Execute next filter (SUPER IMPORTANT)
    $filterChain->execute();
	}
}
