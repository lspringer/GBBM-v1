<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Beer filter form base class.
 *
 * @package    filters
 * @subpackage Beer *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseBeerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'author'     => new sfWidgetFormDoctrineChoice(array('model' => 'User', 'add_empty' => true)),
      'label'      => new sfWidgetFormFilterInput(),
      'style'      => new sfWidgetFormDoctrineChoice(array('model' => 'Style', 'add_empty' => true)),
      'brewery'    => new sfWidgetFormDoctrineChoice(array('model' => 'Brewery', 'add_empty' => true)),
      'image'      => new sfWidgetFormFilterInput(),
      'notes'      => new sfWidgetFormFilterInput(),
      'rating'     => new sfWidgetFormFilterInput(),
      'abv'        => new sfWidgetFormFilterInput(),
      'ibu'        => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'movie_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Movie')),
    ));

    $this->setValidators(array(
      'author'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'User', 'column' => 'id')),
      'label'      => new sfValidatorPass(array('required' => false)),
      'style'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Style', 'column' => 'id')),
      'brewery'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Brewery', 'column' => 'id')),
      'image'      => new sfValidatorPass(array('required' => false)),
      'notes'      => new sfValidatorPass(array('required' => false)),
      'rating'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'abv'        => new sfValidatorPass(array('required' => false)),
      'ibu'        => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'movie_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'Movie', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('beer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addMovieListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('FeaturedPair.movie_id', $values);
  }

  public function getModelName()
  {
    return 'Beer';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'author'     => 'ForeignKey',
      'label'      => 'Text',
      'style'      => 'ForeignKey',
      'brewery'    => 'ForeignKey',
      'image'      => 'Text',
      'notes'      => 'Text',
      'rating'     => 'Number',
      'abv'        => 'Text',
      'ibu'        => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
      'movie_list' => 'ManyKey',
    );
  }
}