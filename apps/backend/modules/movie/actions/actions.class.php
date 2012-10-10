<?php

require_once dirname(__FILE__).'/../lib/movieGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/movieGeneratorHelper.class.php';

/**
 * movie actions.
 *
 * @package    gbbm
 * @subpackage movie
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class movieActions extends autoMovieActions
{
	public function executeLookup(sfWebRequest $request)
  {
  	$this->form = new NfLookupForm();

  	if($request->isMethod('post'))
  	{
  		$this->form->bind($request->getParameter($this->form->getName()));
  		if($this->form->isValid())
  		{
  			$values = $this->form->getValues();
	    	$this->results = Netflix::catalogTitles($values['term']);
	    }
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    if($request->getParameter('m'))
    {
    	$this->movie = Movie::createFromNf(urldecode($request->getParameter('m')));
    }
    else
    {
    	$this->redirect('@lookup_movie');
    }
    $this->movie->author = $this->getUser()->getAttribute('user_id');
    $this->form = $this->configuration->getForm($this->movie);
  }

  public function executeFixGenre(sfWebRequest $request)
  {
  	$movies = Doctrine::getTable('Movie')->createQuery()->fetchArray();

  	foreach($movies as $movie)
  	{
  		$data = Netflix::catalogDetail($movie['nfid']);
  		foreach($data['genre'] as $g)
  		{
	  		$genre = new Genre();
	  		$genre->movie_id = $movie['id'];
	  		$genre->genre = $g;
	  		$genre->save();
	  	}
  	}
  	return sfView::NONE;
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
    	$isNew = $form->getObject()->isNew();
      $notice = $isNew ? 'The item was created successfully.' : 'The item was updated successfully.';

      $file = $form->getValue('uploader');
      unset($form['uploader']);
      $movie = $form->save();

      if($isNew)
      {
      	$data = Netflix::catalogDetail($movie['nfid']);

	  		foreach($data['genre'] as $g)
	  		{
		  		$genre = new Genre();
		  		$genre->movie_id = $movie['id'];
		  		$genre->genre = $g;
		  		$genre->save();
		  	}
      }

			if($file instanceof gbbmValidatedFile)
			{
				$movie->image = $file->process();
				$movie->save();
			}

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $movie)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@movie_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'movie_edit', 'sf_subject' => $movie));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

}
