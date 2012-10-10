<?php

/**
 * user actions.
 *
 * @package    lee
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class securityActions extends sfActions
{
 /**
  * Executes login action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogin(sfWebRequest $request)
  {
  	$this->redirectIf($this->getUser()->isAuthenticated(), '@homepage');
    
    $this->form = new LoginForm();
    
    if($request->isMethod('post') )
    {
    	$this->form->bind($request->getParameter('user'));
    	
    	$values = $this->form->getValues();
    	
    	if($this->form->isValid())
    	{
	    	// Get the user row
	    	$user = Doctrine::getTable('User')->findOneByUsername($values['username']);
	    	
	    	$this->getUser()->login($user);
	    	
	    	$referer = $request->getReferer();
	    	$this->redirectIf($referer, $referer);
	    	$this->redirect('@homepage');
	    }
    }
  }
  
  /**
  * Executes logout action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogout(sfWebRequest $request)
  {
    $this->getUser()->logout();
    $this->redirect('@login');
  }
}
