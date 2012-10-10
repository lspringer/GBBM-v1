<?php

/**
* @author lspringer lee@pyrabot.com
*/

class NetflixBase
{
	const API_KEY = 'hgsv7zy63yh72jj6x68m6tm9';
	const API_SECRET = '6xhPC86EC6';
	const BASE_URL = 'http://api-public.netflix.com/';
	const FORMAT = 'json';
	const DISC_QUEUE = 'disc';
	const INSTANT_QUEUE = 'instant';
	const NO_QUEUE = 'now';
	
	public static $queueTypes = array(
		self::DISC_QUEUE,
		self::INSTANT_QUEUE
	);

	// Internal curl handle variable
	protected $ch;
	protected $execUrl;
	protected $params;
	protected $sigs = array(
		'consumer_key' => self::API_KEY,
		'shared_secret' => self::API_SECRET,
	);
	protected $oAuth;

	/**
	* public function __construct()
	* DESCRIPTION: Netflix object constructor sets up curl handle for use with API
	*/
	public function __construct()
	{
		$this->resetParams();

		// Setup basic curl object
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($this->ch, CURLOPT_FAILONERROR, FALSE);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 60); // Die after a minute
		curl_setopt($this->ch, CURLOPT_SSLVERSION, 3);
		curl_setopt($this->ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($this->ch, CURLINFO_HEADER_OUT, TRUE);
	}

	/**
	* public function __destruct()
	* DESCRIPTION: Netflix object destructor closes curl cleanly
	*/
	public function __destruct()
	{
		// In case we unset somewhere let's cleanup
		curl_close($this->ch);
	}


	protected function setVerb($httpVerb)
	{
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $httpVerb);
	}

	/**
	* protected function setUrl($url)
	* setup the API url
	* @param string $url
	*/
	protected function setUrl($url)
	{
		$url = (string) $url;
		$this->execUrl = (strpos($url, 'http') === FALSE) ? self::BASE_URL.$url : $url;
	}

	/**
	* protected function executeRaw()
	* execute raw curl post
	*/
	protected function executeRaw()
	{
		$this->getSignedUrl();
		if(empty($this->oAuth))
		{
			return NULL;
		}
		curl_setopt($this->ch, CURLOPT_URL, $this->oAuth['signed_url']);
		curl_setopt($this->ch, CURLOPT_HTTPGET, TRUE);
		$result = curl_exec($this->ch);
		return $result;
	}

	/**
	* protected function execute()
	* execute curl post and process json object
	*/
	protected function executeJson()
	{
		$result = $this->executeRaw();
		if($result)
		{
			return json_decode($result);
		}
		return FALSE;
	}

	/**
	* protected function resetParams()
	* Clear param array
	*/
	protected function resetParams()
	{
		$this->params = array(
			'output' => self::FORMAT,
		);
	}

	/**
	* protected function addParam($key, $value)
	* Add a key value pair to params
	* @param string $key
	* @param string $value
	*/
	protected function addParam($key, $value)
	{
		$key = (string) $key;
		$value = (string) $value;
		if(empty($key) || empty($value))
		{
			return NULL;
		}

		$this->params[$key] = $value;
	}

	/**
	* protected function getSignedUrl()
	* Get the OAuth signed url
	*/
	protected function getSignedUrl()
	{
		if(empty($this->execUrl) || empty($this->params) || empty($this->sigs))
		{
			return NULL;
		}
		$oAuthObj = new OAuthSimple();
		$this->oAuth = $oAuthObj->sign(array(
			'path' => $this->execUrl,
			'parameters' => $this->params,
			'signatures' => $this->sigs,
		));
	}
}

