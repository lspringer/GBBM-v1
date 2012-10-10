<?php

/**
 * User form base class.
 *
 * @package    form
 * @subpackage user
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'username'   => new sfWidgetFormInput(),
      'password'   => new sfWidgetFormInput(),
      'role'       => new sfWidgetFormChoice(array('choices' => array('disabled' => 'disabled', 'normal' => 'normal', 'admin' => 'admin'))),
      'email'      => new sfWidgetFormInput(),
      'token'      => new sfWidgetFormInput(),
      'nftoken'    => new sfWidgetFormInput(),
      'nfsecret'   => new sfWidgetFormInput(),
      'nfauth'     => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'username'   => new sfValidatorString(array('max_length' => 255)),
      'password'   => new sfValidatorString(array('max_length' => 255)),
      'role'       => new sfValidatorChoice(array('choices' => array('disabled' => 'disabled', 'normal' => 'normal', 'admin' => 'admin'))),
      'email'      => new sfValidatorString(array('max_length' => 255)),
      'token'      => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'nftoken'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nfsecret'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nfauth'     => new sfValidatorBoolean(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'User', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
