<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Genre filter form base class.
 *
 * @package    filters
 * @subpackage Genre *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseGenreFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'movie_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Movie', 'add_empty' => true)),
      'genre'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'movie_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Movie', 'column' => 'id')),
      'genre'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('genre_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genre';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'movie_id' => 'ForeignKey',
      'genre'    => 'Text',
    );
  }
}