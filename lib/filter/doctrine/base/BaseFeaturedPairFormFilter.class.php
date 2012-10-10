<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * FeaturedPair filter form base class.
 *
 * @package    filters
 * @subpackage FeaturedPair *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseFeaturedPairFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'beer_id'  => new sfWidgetFormDoctrineChoice(array('model' => 'Beer', 'add_empty' => true)),
      'movie_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Movie', 'add_empty' => true)),
      'meta'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'beer_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Beer', 'column' => 'id')),
      'movie_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Movie', 'column' => 'id')),
      'meta'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('featured_pair_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FeaturedPair';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'beer_id'  => 'ForeignKey',
      'movie_id' => 'ForeignKey',
      'meta'     => 'Text',
    );
  }
}