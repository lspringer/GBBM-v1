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

 		if($request->getParameter('movie_id') && $request->getParameter('beer_id'))
 		{
 			$this->combo = new Randomizer();
			$this->combo->movie = Doctrine::getTable('Movie')->find($request->getParameter('movie_id'));
			$this->combo->beer = Doctrine::getTable('Beer')->find($request->getParameter('beer_id'));
			$this->combo->type = Randomizer::TYPE_FORCED;
			$this->combo->meta = 'personal tastes or lack thereof';
			$this->combo->nfData = Netflix::catalogDetail($this->combo->movie->nfid);

			if(!$this->combo->movie || !$this->combo->beer)
			{
				$this->redirect('@homepage');
			}
 		}
 		//Tools::p($this->combo->movie->toArray(),1);

 		$this->getUser()->randomTracker($this->combo->beer->id, $this->combo->movie->id);
 	}

	public function executeLogin(sfWebRequest $request)
	{
		sfLoader::loadHelpers('Url');
		$tokenArray = Netflix::requestToken();
		$this->getResponse()->setCookie('nfs', $tokenArray['oauth_token_secret'], 0);
		if($request->getParameter('queue') == Netflix::NO_QUEUE)
		{
			$movie = Doctrine::getTable('Movie')->find($request->getParameter('movie_id'));
			$callback = Netflix::getPlayerLink($movie->nfid);
		}
		else
		{
			$callback = url_for('@add_movie?movie_id='.$request->getParameter('movie_id').'&beer_id='.$request->getParameter('beer_id').'&queue='.$request->getParameter('queue'), TRUE);
		}
		$queryData = array(
			'application_name' => $tokenArray['application_name'],
			'oauth_consumer_key' => Netflix::API_KEY,
			'oauth_callback' => $callback,
		);
		$nfUrl = sprintf('%s&%s',$tokenArray['login_url'], http_build_query($queryData));
		$this->redirect($nfUrl);
	}

	public function executeAdd_movie(sfWebRequest $request)
	{
		$auth = array(
			'oauth_token_secret' => $request->getCookie('nfs'),
			'oauth_token' => $request->getCookie('nft'),
			'user_id' => $request->getCookie('nfi'),
		);
		if($request->getParameter('oauth_token') && $request->getCookie('nfs'))
		{
			$auth = Netflix::authorizeToken($request->getParameter('oauth_token'), $request->getCookie('nfs'));
			$this->getResponse()->setCookie('nfs', $auth['oauth_token_secret'], strtotime('+90 days'));
			$this->getResponse()->setCookie('nft', $auth['oauth_token'], strtotime('+90 days'));
			$this->getResponse()->setCookie('nfi', $auth['user_id'], strtotime('+90 days'));
		}

		$this->movie = Doctrine::getTable('Movie')->find($request->getParameter('movie_id'));
		Netflix::addTitle($auth, $this->movie->nfid, $request->getParameter('queue'));
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
