<?php

/**
 * beer module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage beer
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class BaseBeerGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getCredentials($action)
  {
    if (0 === strpos($action, '_'))
    {
      $action = substr($action, 1);
    }

    return isset($this->configuration['credentials'][$action]) ? $this->configuration['credentials'][$action] : array();
  }

  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%=label%% - %%style%% - %%brewery%% - %%updated_at%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Beer List';
  }

  public function getEditTitle()
  {
    return 'Edit Beer';
  }

  public function getNewTitle()
  {
    return 'New Beer';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'author',  1 => 'label',  2 => 'style',  3 => 'brewery',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'author',  1 => 'label',  2 => 'image',  3 => '_thumbnail',  4 => 'uploader',  5 => 'style',  6 => 'abv',  7 => 'ibu',  8 => 'brewery',  9 => 'rating',  10 => 'notes',);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '=label',  1 => 'style',  2 => 'brewery',  3 => 'updated_at',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'author' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'label' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'style' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'brewery' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'image' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'notes' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'rating' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'abv' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'ABV',),
      'ibu' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'IBU',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'movie_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'uploader' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Upload',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'label' => array(),
      'style' => array(),
      'brewery' => array(),
      'image' => array(),
      'notes' => array(),
      'rating' => array(),
      'abv' => array(),
      'ibu' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'movie_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'label' => array(),
      'style' => array(),
      'brewery' => array(),
      'image' => array(),
      'notes' => array(),
      'rating' => array(),
      'abv' => array(),
      'ibu' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'movie_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'label' => array(),
      'style' => array(),
      'brewery' => array(),
      'image' => array(),
      'notes' => array(),
      'rating' => array(),
      'abv' => array(),
      'ibu' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'movie_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'label' => array(),
      'style' => array(),
      'brewery' => array(),
      'image' => array(),
      'notes' => array(),
      'rating' => array(),
      'abv' => array(),
      'ibu' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'movie_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'label' => array(),
      'style' => array(),
      'brewery' => array(),
      'image' => array(),
      'notes' => array(),
      'rating' => array(),
      'abv' => array(),
      'ibu' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'movie_list' => array(),
    );
  }


  /**
   * Gets a new form object.
   *
   * @param  mixed $object
   *
   * @return sfForm
   */
  public function getForm($object = null)
  {
    $class = $this->getFormClass();

    return new $class($object, $this->getFormOptions());
  }

  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'BeerForm';
  }

  public function getFormOptions()
  {
    return array();
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'BeerFormFilter';
  }

  public function getFilterForm($filters)
  {
    $class = $this->getFilterFormClass();

    return new $class($filters, $this->getFilterFormOptions());
  }

  public function getFilterFormOptions()
  {
    return array();
  }

  public function getFilterDefaults()
  {
    return array();
  }

  public function getPager($model)
  {
    $class = $this->getPagerClass();

    return new $class($model, $this->getPagerMaxPerPage());
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array('label', 'asc');
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }

  public function getConnection()
  {
    return null;
  }
}
