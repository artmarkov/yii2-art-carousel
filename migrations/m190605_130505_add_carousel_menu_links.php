<?php

use yii\db\Migration;

class m190605_130505_add_carousel_menu_links extends Migration
{

    public function up()
    {
        $this->insert('{{%menu_link}}', ['id' => 'carousel', 'menu_id' => 'admin-menu', 'link' => '/carousel/default/index', 'created_by' => 1, 'order' => 1]);        
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'carousel', 'label' => 'Carousel', 'language' => 'en-US']);
        
    }

    public function down()
    {
        $this->delete('{{%menu_link}}', ['like', 'id', 'carousel']);
    }
}