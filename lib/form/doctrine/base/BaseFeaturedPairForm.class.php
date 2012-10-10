<?php

/**
 * FeaturedPair form base class.
 *
 * @package    form
 * @subpackage featured_pair
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseFeaturedPairForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'beer_id'  => new sfWidgetFormDoctrineChoice(array('model' => 'Beer', 'add_empty' => false)),
      'movie_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Movie', 'add_empty' => false)),
      'meta'     => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorDoctrineChoice(array('model' => 'FeaturedPair', 'column' => 'id', 'required' => false)),
      'beer_id'  => new sfValidatorDoctrineChoice(array('model' => 'Beer')),
      'movie_id' => new sfValidatorDoctrineChoice(array('model' => 'Movie')),
      'meta'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('featured_pair[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FeaturedPair';
  }

}
