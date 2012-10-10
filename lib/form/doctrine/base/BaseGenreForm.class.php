<?php

/**
 * Genre form base class.
 *
 * @package    form
 * @subpackage genre
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseGenreForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'movie_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Movie', 'add_empty' => false)),
      'genre'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorDoctrineChoice(array('model' => 'Genre', 'column' => 'id', 'required' => false)),
      'movie_id' => new sfValidatorDoctrineChoice(array('model' => 'Movie')),
      'genre'    => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('genre[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genre';
  }

}
