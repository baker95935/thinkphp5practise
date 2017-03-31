<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateSettingTable extends Migrator
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
	  $this->table('setting',['engine'=>'MyISAM'])
	    ->addColumn(Column::string('web_name')->setComment('网站名称'))
	    ->addColumn(Column::string('web_url')->setComment('网址'))
	    ->addColumn(Column::string('web_title')->setComment('网站标题'))
	    ->addColumn(Column::string('web_description')->setComment('网站描述'))
	    ->addColumn(Column::string('web_keywords')->setComment('网站关键字'))
	    ->addColumn(Column::string('icp_info')->setComment('ICP备案信息'))
	    ->addTimestamps()
	    ->create();
	}
	
	/**
	* Down Method.
	*/
	public function down()
	{
	    $this->dropTable('setting');
	}
}
