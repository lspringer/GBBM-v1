<?php

class homepageComponents extends sfComponents
{
 	public function executeBeerPicker(sfWebRequest $request)
 	{
 		$values = $this->getUser()->getAttribute('pairing');
 		$this->beerPager = new sfDoctrinePager('Beer', 1);
		$this->beerPager->setQuery(Doctrine::getTable('Beer')->getByStyleQuery($values['style']));
		$this->beerPager->setPage($request->getParameter('beerPage', 1));
		$this->beerPager->init();
		// Pop 1 object from Doctrine Collection
		foreach($this->beerPager->getResults() as $row)
		{
			$this->object = $row;
			break;
		}
 	}

 	public function executeMoviePicker(sfWebRequest $request)
 	{
 		$values = $this->getUser()->getAttribute('pairing');
 		$this->moviePager = new sfDoctrinePager('Movie', 1);
		$this->moviePager->setQuery(Doctrine::getTable('Movie')->getByGenreQuery($values['genre']));
		$this->moviePager->setPage($request->getParameter('moviePage', 1));
		$this->moviePager->init();
		// Pop 1 object from Doctrine Collection
		foreach($this->moviePager->getResults() as $row)
		{
			$this->object = $row;
			break;
		}
 	}

}
