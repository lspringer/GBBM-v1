<?php

/**
 * ajax actions.
 *
 * @package    gbbm
 * @subpackage ajax
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class ajaxActions extends sfActions
{
	public function executeCombo(sfWebRequest $request)
	{
		$this->combo = Randomizer::pickOne($this->getUser()->getAttribute('bTracker'), $this->getUser()->getAttribute('mTracker'));
		$this->getUser()->randomTracker($this->combo->beer->id, $this->combo->movie->id);
		$return['movie'] = $this->combo->movie->toArray();
		$return['beer'] = $this->combo->beer->toArray();
		$return = json_encode($return);
		return $this->renderPartial('global/combo', array('combo' => $this->combo));
	}
	
	public function executeBeerPicker(sfWebRequest $request)
 	{
 		return $this->renderComponent('homepage', 'beerPicker');
 	}
 	
 	public function executeMoviePicker(sfWebRequest $request)
 	{
 		return $this->renderComponent('homepage', 'moviePicker');
 	}
}
