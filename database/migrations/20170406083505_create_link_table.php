<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateLinkTable extends Migrator
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
	  $this->table('link',['engine'=>'MyISAM'])
	    ->addColumn(Column::string('link_name')->setUnique()->setComment('链接名称'))
	    ->addColumn(Column::string('link_url')->setUnique()->setComment('链接地址'))
	    ->addColumn(Column::integer('link_order')->setComment('链接排序'))
	    ->addColumn(Column::string('link_img_url')->setComment('链接图片地址'))
	    ->addColumn(Column::string('remark')->setComment('备注'))
	    ->addTimestamps()
	    ->create();
	}
	
	/**
	* Down Method.
	*/
	public function down()
	{
	    $this->dropTable('link');
	}
}
