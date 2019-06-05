<?php

use yii\db\Migration;

class m190605_132010_i18n_ru_menu_carousel extends Migration
{

    public function up()
    {
        
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'carousel', 'label' => 'Карусель', 'language' => 'ru']);

    }

}