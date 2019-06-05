<?php

use yii\db\Migration;

class m190605_125959_create_carousel_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
             $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%carousel}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'items' => $this->smallInteger()->notNull(),
            'single_item' => $this->tinyInteger()->notNull(),
            'navigation' => $this->tinyInteger()->notNull(),
            'pagination' => $this->tinyInteger()->notNull(),
            'transition_style' => $this->string()->notNull(),
            'auto_play' => $this->string()->notNull(),
            'status' => $this->tinyInteger()->notNull()->defaultValue('0'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('created_by', '{{%carousel}}', 'created_by');
        $this->createIndex('updated_by', '{{%carousel}}', 'updated_by');
        $this->addForeignKey('carousel_ibfk_1', '{{%carousel}}', 'created_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('carousel_ibfk_2', '{{%carousel}}', 'updated_by', '{{%user}}', 'id', 'RESTRICT', 'RESTRICT');
    }
    
    public function down()
    {
       $this->dropTable('{{%carousel}}');
    }
}
