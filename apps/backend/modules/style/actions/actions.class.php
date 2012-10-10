<?php

require_once dirname(__FILE__).'/../lib/styleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/styleGeneratorHelper.class.php';

/**
 * style actions.
 *
 * @package    gbbm
 * @subpackage style
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class styleActions extends autoStyleActions
{
	protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

			$file = $form->getValue('uploader');
      unset($form['uploader']);
      $style = $form->save();
      
			if($file instanceof gbbmValidatedFile)
			{
				$style->image = $file->process();
				$style->save();
			}

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $style)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@style_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'style_edit', 'sf_subject' => $style));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
