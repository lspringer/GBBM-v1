<?php

/**
* @author lspringer lee@pyrabot.com
*/

class Netflix extends NetflixBase
{
	/**
	* public function catalogTitles($term, $limit = 5, $start_index = NULL)
	* @param string $term
	* @param int $limit optional
	* @param int $start_index optional
	* @return stdClass
	*/
	public static function catalogTitles($term, $limit = 5, $start_index = NULL)
	{
		$term = (string) $term;
		$limit = (int) $limit;
		$start_index = is_null($start_index) ? NULL : (int) $start_index;
		if(empty($term))
		{
			return NULL;
		}
		$nf = new Netflix();
		$nf->setUrl('catalog/titles');
		$nf->addParam('term', $term);
		$nf->addParam('max_results', $limit);
		$nf->addParam('expand', 'synopsis,available_formats');
		if($start_index)
		{
			$nf->addParam('start_index', $start_index);
		}
		
		return self::formatNfTitle($nf->executeJson());
	}

	/**
	* public function catalogDetail($url)
	* @param string $url URL from earlier netflix call
	* @return stdClass
	*/
	public static function catalogDetail($url)
	{
		$url = (string) $url;
		if(empty($url))
		{
			return NULL;
		}
		$nf = new Netflix();

		$nf->setUrl($url);
		$nf->addParam('expand', 'synopsis,available_formats');
		$data = self::formatNfTitle($nf->executeJson());
		return $data;
	}

	/**
	* public function catalogSimilar($url, limit = 5, $start_index = NULL)
	* @param string $url URL from earlier netflix call
	* @return stdClass
	*/
	public static function catalogSimilar($url, $limit = 5, $start_index = NULL)
	{
		$url = (string) $url;
		$limit = (int) $limit;
		$start_index = is_null($start_index) ? NULL : (int) $start_index;
		if(empty($url))
		{
			return NULL;
		}
		$nf = new Netflix();
		$nf->setUrl($url);
		$nf->addParam('expand', 'synopsis');
		$nf->addParam('max_results', $limit);
		if($start_index)
		{
			$this->addParam('start_index', $start_index);
		}

		return self::formatNfTitle($nf->executeJson());
	}

	/**
	* public static function formatNfTitle(stdClass $data = NULL)
	* Format from json to template friendly object
	* @param stdClass $data
	* @return array|stdClass
	*/
	public static function formatNfTitle(stdClass $data = NULL)
	{
		if(is_null($data))
		{
			return NULL;
		}		
		if(isset($data->catalog_titles))
		{
			$loop = &$data->catalog_titles->catalog_title;
		}
		elseif(isset($data->similars))
		{
			$loop = &$data->similars->similars_item;
		}
		else
		{
			$loop[] = &$data->catalog_title;
			$one = TRUE;
		}
		
		$now = time();
		foreach($loop as $title)
		{
			$temp = array(
				'image' => $title->box_art->large,
				'title' => $title->title->regular,
				'rating' => $title->average_rating,
				'year' => $title->release_year,
				'id' => $title->id,
				'runtime' => round((int) $title->runtime / 60),
				'synopsis' => null,
				'link' => null,
				'similar' => null,
				'formats' => null,
				'genre' => array(),
			);
			foreach($title->link as $v)
			{
				if($v->title == 'synopsis')
				{
					$temp['synopsis'] = $v->synopsis;
				}
				elseif($v->title == 'web page')
				{
					$temp['link'] = $v->href;
				}
				elseif($v->title == 'similars')
				{
					$temp['similar'] = $v->href;
				}
				elseif($v->title == 'formats')
				{
					$temp['formats'] = $v->href;
					$temp['format_array'] = array();
					if(is_array($v->delivery_formats->availability))
					{
						$availArray = $v->delivery_formats->availability;
					}
					else
					{
						$availArray = array($v->delivery_formats->availability);
					}
					foreach($availArray as $d)
					{
						if(isset($d->available_from) && $d->available_from > $now)
						{
							continue;
						}
						elseif(isset($d->available_until) && $now > $d->available_until)
						{
							continue;
						}						
						$label = $d->category->label;
						$temp['format_array'][$label] = $label;
					}
				}
			}
			foreach($title->category as $v)
			{
				if(strpos($v->scheme, 'genre') !== FALSE)
				{
					$temp['genre'][] = $v->term;
				}
			}
			
			$return[] = $temp;
		}
		return $one ? array_shift($return) : $return;
	}

	/**
	* Get a request token for OAuth access
	* @return array
	*/
	public static function requestToken()
	{
		$nf = new Netflix();
		$nf->setUrl('oauth/request_token');
		return (array) $nf->executeJson();;
	}

	/**
	* Exchange the request token with an authorized token
	* @param string $token Request Token
	* @param string $secret Request Token Secret
	* @return array
	*/
	public static function authorizeToken($token, $secret)
	{
		$nf = new Netflix();
		$nf->setUrl('oauth/access_token');
		$nf->sigs['oauth_token'] = $token;
		$nf->sigs['oauth_secret'] = $secret;
		return (array) $nf->executeJson();
	}

	/**
	* Add title to user's queue
	* @param array Auth token array from authorizeToken
	* @param string $title
	* @return bool
	*/
	public static function addTitle(array $authData, $title, $type = NULL)
	{
		if(is_null($type) || !in_array($type, self::$queueTypes))
		{
			$type = self::DISC_QUEUE;
		}
		$current = self::getQueue($authData, $type);
		$nf = new Netflix();
		$nf->sigs['oauth_token'] = $authData['oauth_token'];
		$nf->sigs['oauth_secret'] = $authData['oauth_token_secret'];
		$nf->setUrl(sprintf('users/%s/queues/%s', $authData['user_id'], $type));
		$nf->addParam('title_ref', $title);
		$nf->addParam('etag', $current->queue->etag);
		$nf->addParam('method', 'POST');
		return (array) $nf->executeJson();
	}

	/**
	* Get User Queue
	* @param array Auth token array from authorizeToken
	* @return array
	*/
	public static function getQueue(array $authData, $type = NULL)
	{
		if(is_null($type) || !in_array($type, self::$queueTypes))
		{
			$type = self::DISC_QUEUE;
		}
		$nf = new Netflix();
		$nf->setUrl(sprintf('users/%s/queues/%s', $authData['user_id'], $type));
		$nf->sigs['oauth_token'] = $authData['oauth_token'];
		$nf->sigs['oauth_secret'] = $authData['oauth_token_secret'];
		return $nf->executeJson();
	}
	
	/**
	* Get Player Link
	* @param string $url URL from earlier netflix call
	* @return string
	*/
	public static function getPlayerLink($url)
	{		
		if(empty($url))
		{
			return NULL;
		}
		return sprintf(
			'http://movies.netflix.com/WiPlayer?movieid=%s',
			str_replace('http://api.netflix.com/catalog/titles/movies/', '', $url)
		);
	}
}