<?php

/**
 * homepage actions.
 *
 * @package    gbbm
 * @subpackage homepage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class homepageActions extends sfActions
{
 	public function executeIndex(sfWebRequest $request)
 	{
 		$this->combo = Randomizer::pickOne($this->getUser()->getAttribute('bTracker'), $this->getUser()->getAttribute('mTracker'));
 		$this->getUser()->randomTracker($this->combo->beer->id, $this->combo->movie->id);
 	}

	public function executePrivacy(sfWebRequest $request)
	{
	}

	public function executeAbout(sfWebRequest $request)
	{
	}

	public function executeError(sfWebRequest $request)
	{
	}

	public function executePairingTypes(sfWebRequest $request)
	{
		$this->form = new PairingTypesForm();
		if($request->isMethod('POST'))
		{
			$values = $request->getParameter($this->form->getName());
			$this->form->bind($values);
			if($this->form->isValid())
			{
				$this->getUser()->setAttribute('pairing', $values);
				$this->redirect('@pairingPicks');
			}
		}
	}

	public function executePairingPicks(sfWebRequest $request)
	{
		$values = $this->getUser()->getAttribute('pairing');
		$this->redirectIf(!$values, '@pairingTypes');
	}
}
