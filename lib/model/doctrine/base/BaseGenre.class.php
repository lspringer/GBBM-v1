<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseGenre extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('genre');
        $this->hasColumn('id', 'integer', 10, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '10',
             ));
        $this->hasColumn('movie_id', 'integer', 10, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '10',
             ));
        $this->hasColumn('genre', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('Movie', array(
             'local' => 'movie_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));
    }
}