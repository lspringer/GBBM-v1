<?php

/**
 * movie module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage movie
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 12474 2008-10-31 10:41:27Z fabien $
 */
class BaseMovieGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_new' => NULL,  'lookup' =>   array(    'action' => 'lookup',  ),);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%=title%% - %%year%% - %%runtime%% - %%updated_at%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Movie List';
  }

  public function getEditTitle()
  {
    return 'Edit Movie';
  }

  public function getNewTitle()
  {
    return 'New Movie';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'author',  1 => 'title',  2 => 'synopsis',  3 => 'year',  4 => 'runtime',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'author',  1 => 'title',  2 => 'image',  3 => 'uploader',  4 => 'rating',  5 => 'year',  6 => 'runtime',  7 => 'synopsis',);
  }

  public function getEditDisplay()
  {
    return array(  'Movie Data' =>   array(    0 => 'author',    1 => 'title',    2 => 'image',    3 => '_thumbnail',    4 => 'uploader',    5 => 'rating',    6 => 'year',    7 => 'runtime',    8 => 'synopsis',  ),  'Genres' =>   array(    0 => '_genres',  ),  'Netflix Keys' =>   array(    0 => '_nfdata',  ),);
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '=title',  1 => 'year',  2 => 'runtime',  3 => 'updated_at',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'author' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'image' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'title' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'rating' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'year' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nfid' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'runtime' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'synopsis' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nflink' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nfsimilar' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'beer_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'uploader' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Upload',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'image' => array(),
      'title' => array(),
      'rating' => array(),
      'year' => array(),
      'nfid' => array(),
      'runtime' => array(),
      'synopsis' => array(),
      'nflink' => array(),
      'nfsimilar' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'beer_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'image' => array(),
      'title' => array(),
      'rating' => array(),
      'year' => array(),
      'nfid' => array(),
      'runtime' => array(),
      'synopsis' => array(),
      'nflink' => array(),
      'nfsimilar' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'beer_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'image' => array(),
      'title' => array(),
      'rating' => array(),
      'year' => array(),
      'nfid' => array(),
      'runtime' => array(),
      'synopsis' => array(),
      'nflink' => array(),
      'nfsimilar' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'beer_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'image' => array(),
      'title' => array(),
      'rating' => array(),
      'year' => array(),
      'nfid' => array(),
      'runtime' => array(),
      'synopsis' => array(),
      'nflink' => array(),
      'nfsimilar' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'beer_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'author' => array(),
      'image' => array(),
      'title' => array(),
      'rating' => array(),
      'year' => array(),
      'nfid' => array(),
      'runtime' => array(),
      'synopsis' => array(),
      'nflink' => array(),
      'nfsimilar' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'beer_list' => array(),
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
    return 'MovieForm';
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
    return 'MovieFormFilter';
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
    return array('title', 'asc');
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
