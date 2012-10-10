<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * User filter form base class.
 *
 * @package    filters
 * @subpackage User *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'   => new sfWidgetFormFilterInput(),
      'password'   => new sfWidgetFormFilterInput(),
      'role'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'disabled' => 'disabled', 'normal' => 'normal', 'admin' => 'admin'))),
      'email'      => new sfWidgetFormFilterInput(),
      'token'      => new sfWidgetFormFilterInput(),
      'nftoken'    => new sfWidgetFormFilterInput(),
      'nfsecret'   => new sfWidgetFormFilterInput(),
      'nfauth'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'username'   => new sfValidatorPass(array('required' => false)),
      'password'   => new sfValidatorPass(array('required' => false)),
      'role'       => new sfValidatorChoice(array('required' => false, 'choices' => array('disabled' => 'disabled', 'normal' => 'normal', 'admin' => 'admin'))),
      'email'      => new sfValidatorPass(array('required' => false)),
      'token'      => new sfValidatorPass(array('required' => false)),
      'nftoken'    => new sfValidatorPass(array('required' => false)),
      'nfsecret'   => new sfValidatorPass(array('required' => false)),
      'nfauth'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'username'   => 'Text',
      'password'   => 'Text',
      'role'       => 'Enum',
      'email'      => 'Text',
      'token'      => 'Text',
      'nftoken'    => 'Text',
      'nfsecret'   => 'Text',
      'nfauth'     => 'Boolean',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}