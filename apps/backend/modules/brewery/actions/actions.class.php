<?php

require_once dirname(__FILE__).'/../lib/breweryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/breweryGeneratorHelper.class.php';

/**
 * brewery actions.
 *
 * @package    gbbm
 * @subpackage brewery
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class breweryActions extends autoBreweryActions
{
	protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

			$file = $form->getValue('uploader');
      unset($form['uploader']);
      $brewery = $form->save();
      
			if($file instanceof gbbmValidatedFile)
			{
				$brewery->image = $file->process();
				$brewery->save();
			}

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $brewery)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@brewery_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'brewery_edit', 'sf_subject' => $brewery));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
