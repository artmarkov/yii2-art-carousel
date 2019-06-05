<?php

namespace artsoft\carousel\controllers;
use Yii;

/**
 * CarouselController implements the CRUD actions for artsoft\models\Carousel model.
 */
class DefaultController extends \backend\controllers\DefaultController 
{
    public $modelClass       = 'artsoft\carousel\models\Carousel';
    public $modelSearchClass = 'artsoft\carousel\models\search\CarouselSearch';

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}
