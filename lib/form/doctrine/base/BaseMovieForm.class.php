<?php

/**
 * Movie form base class.
 *
 * @package    form
 * @subpackage movie
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseMovieForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'author'     => new sfWidgetFormDoctrineChoice(array('model' => 'User', 'add_empty' => false)),
      'image'      => new sfWidgetFormInput(),
      'title'      => new sfWidgetFormInput(),
      'rating'     => new sfWidgetFormInput(),
      'year'       => new sfWidgetFormInput(),
      'nfid'       => new sfWidgetFormInput(),
      'runtime'    => new sfWidgetFormInput(),
      'synopsis'   => new sfWidgetFormTextarea(),
      'nflink'     => new sfWidgetFormInput(),
      'nfsimilar'  => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'beer_list'  => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Beer')),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'Movie', 'column' => 'id', 'required' => false)),
      'author'     => new sfValidatorDoctrineChoice(array('model' => 'User')),
      'image'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 255)),
      'rating'     => new sfValidatorNumber(array('required' => false)),
      'year'       => new sfValidatorInteger(),
      'nfid'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'runtime'    => new sfValidatorInteger(array('required' => false)),
      'synopsis'   => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'nflink'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nfsimilar'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'beer_list'  => new sfValidatorDoctrineChoiceMany(array('model' => 'Beer', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('movie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Movie';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['beer_list']))
    {
      $this->setDefault('beer_list', $this->object->Beer->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveBeerList($con);
  }

  public function saveBeerList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['beer_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Beer->getPrimaryKeys();
    $values = $this->getValue('beer_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Beer', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Beer', array_values($link));
    }
  }

}
