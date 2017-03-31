<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateArticleTable extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
	public function up()
	{
	  $this->table('article',['engine'=>'MyISAM'])
	    ->addColumn(Column::string('title')->setUnique()->setComment('标题'))
	    ->addColumn(Column::text('content')->setComment('内容'))
	    ->addColumn(Column::string('author')->setComment('作者'))
	    ->addColumn(Column::integer('type_id')->setComment('文章类型'))
	    ->addColumn(Column::integer('views')->setComment('浏览量'))
	    ->addColumn(Column::integer('user_id')->setComment('发布者ID'))
	    ->addTimestamps()
	    ->create();
	}
	
	/**
	* Down Method.
	*/
	public function down()
	{
	    $this->dropTable('article');
	}
}
