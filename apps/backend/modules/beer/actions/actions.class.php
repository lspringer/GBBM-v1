<?php

require_once dirname(__FILE__).'/../lib/beerGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/beerGeneratorHelper.class.php';

/**
 * beer actions.
 *
 * @package    gbbm
 * @subpackage beer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class beerActions extends autoBeerActions
{
	public function executeNew(sfWebRequest $request)
  {
    $this->beer = new Beer();
    $this->beer->author = $this->getUser()->getAttribute('user_id');
    $this->form = $this->configuration->getForm($this->beer);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

			$file = $form->getValue('uploader');
      unset($form['uploader']);
      $beer = $form->save();

			if($file instanceof gbbmValidatedFile)
			{
				$beer->image = $file->process();
				$beer->save();
			}

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $beer)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@beer_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'beer_edit', 'sf_subject' => $beer));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}