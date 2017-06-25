<?php

use think\migration\Migrator;
use think\migration\db\Column;

class AlterSettingTable extends Migrator
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
    public function change()
    {
    	$this->table('setting',['engine'=>'MyISAM'])
	    ->addColumn(Column::string('logo_addr')->setComment('网站LOGO'))
	    ->addColumn(Column::string('contact_tel')->setComment('网站联系电话'))
	    ->addColumn(Column::string('contact_email')->setComment('网站联系邮箱'))
	    ->addColumn(Column::string('contact_addr')->setComment('网站联系地址'))
	    ->update();

    }
}
