<?php

use artsoft\db\SourceMessagesMigration;

class m190605_131516_i18n_art_carousel_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'art/carousel';
    }

    public function getMessages()
    {
        return [
            'Auto Play' => 1,            
            'Carousel' => 1,
            'Items Qty' => 1,
            'Single Item' => 1,
            'Transition Style' => 1,
            'Navigation' => 1,
            'Pagination' => 1,
        ];
    }
}