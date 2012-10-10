<?php

/**
 * Beer form base class.
 *
 * @package    form
 * @subpackage beer
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseBeerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'author'     => new sfWidgetFormDoctrineChoice(array('model' => 'User', 'add_empty' => false)),
      'label'      => new sfWidgetFormInput(),
      'style'      => new sfWidgetFormDoctrineChoice(array('model' => 'Style', 'add_empty' => false)),
      'brewery'    => new sfWidgetFormDoctrineChoice(array('model' => 'Brewery', 'add_empty' => false)),
      'image'      => new sfWidgetFormInput(),
      'notes'      => new sfWidgetFormTextarea(),
      'rating'     => new sfWidgetFormInput(),
      'abv'        => new sfWidgetFormInput(),
      'ibu'        => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'movie_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Movie')),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'Beer', 'column' => 'id', 'required' => false)),
      'author'     => new sfValidatorDoctrineChoice(array('model' => 'User')),
      'label'      => new sfValidatorString(array('max_length' => 255)),
      'style'      => new sfValidatorDoctrineChoice(array('model' => 'Style')),
      'brewery'    => new sfValidatorDoctrineChoice(array('model' => 'Brewery')),
      'image'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'notes'      => new sfValidatorString(array('required' => false)),
      'rating'     => new sfValidatorNumber(array('required' => false)),
      'abv'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ibu'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
      'movie_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'Movie', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('beer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Beer';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['movie_list']))
    {
      $this->setDefault('movie_list', $this->object->Movie->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveMovieList($con);
  }

  public function saveMovieList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['movie_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Movie->getPrimaryKeys();
    $values = $this->getValue('movie_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Movie', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Movie', array_values($link));
    }
  }

}
