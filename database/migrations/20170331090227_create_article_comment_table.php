<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateArticleCommentTable extends Migrator
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
	  $this->table('article_comment',['engine'=>'MyISAM'])
	    ->addColumn(Column::string('title')->setUnique()->setComment('标题'))
	    ->addColumn(Column::text('content')->setComment('内容'))
	    ->addColumn(Column::string('username')->setComment('发布者用户名'))
	    ->addColumn(Column::integer('article_id')->setComment('文章ID'))
	    ->addColumn(Column::integer('user_id')->setComment('用户ID'))
	    ->addColumn(Column::integer('create_time')->setComment('添加时间'))
	    ->create();
	}
	
	/**
	* Down Method.
	*/
	public function down()
	{
	    $this->dropTable('article_comment');
	}
}
