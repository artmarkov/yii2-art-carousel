<?php

use artsoft\db\TranslatedMessagesMigration;

class m190605_132815_i18n_ru_art_carousel extends TranslatedMessagesMigration
{

    public function getLanguage()
    {
        return 'ru';
    }

    public function getCategory()
    {
        return 'art/carousel';
    }

    public function getTranslations()
    {
        return [
            'Auto Play' => 'Авто',            
            'Carousel' => 'Карусель',
            'Items Qty' => 'Слайдов в окне',
            'Single Item' => 'Ед.элемент',
            'Transition Style' => 'Переход',
            'Navigation' => 'Навигация',
            'Pagination' => 'Пагинация',
        ];
        
    }
}