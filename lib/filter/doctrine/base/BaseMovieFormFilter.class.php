<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Movie filter form base class.
 *
 * @package    filters
 * @subpackage Movie *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseMovieFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author'     => new sfWidgetFormDoctrineChoice(array('model' => 'User', 'add_empty' => true)),
      'image'      => new sfWidgetFormFilterInput(),
      'title'      => new sfWidgetFormFilterInput(),
      'rating'     => new sfWidgetFormFilterInput(),
      'year'       => new sfWidgetFormFilterInput(),
      'nfid'       => new sfWidgetFormFilterInput(),
      'runtime'    => new sfWidgetFormFilterInput(),
      'synopsis'   => new sfWidgetFormFilterInput(),
      'nflink'     => new sfWidgetFormFilterInput(),
      'nfsimilar'  => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'beer_list'  => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Beer')),
    ));

    $this->setValidators(array(
      'author'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
      'image'      => new sfValidatorPass(array('required' => false)),
      'title'      => new sfValidatorPass(array('required' => false)),
      'rating'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'year'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nfid'       => new sfValidatorPass(array('required' => false)),
      'runtime'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'synopsis'   => new sfValidatorPass(array('required' => false)),
      'nflink'     => new sfValidatorPass(array('required' => false)),
      'nfsimilar'  => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'beer_list'  => new sfValidatorDoctrineChoiceMany(array('model' => 'Beer', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('movie_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addBeerListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.FeaturedPair FeaturedPair')
          ->andWhereIn('FeaturedPair.beer_id', $values);
  }

  public function getModelName()
  {
    return 'Movie';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'author'     => 'ForeignKey',
      'image'      => 'Text',
      'title'      => 'Text',
      'rating'     => 'Number',
      'year'       => 'Number',
      'nfid'       => 'Text',
      'runtime'    => 'Number',
      'synopsis'   => 'Text',
      'nflink'     => 'Text',
      'nfsimilar'  => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'beer_list'  => 'ManyKey',
    );
  }
}