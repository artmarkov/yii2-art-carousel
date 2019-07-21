<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\carousel\models\Carousel */

$this->title = Yii::t('yii', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/carousel', 'Carousel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>

<div class="carousel-create">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"><?=  Html::encode($this->title) ?></h3>            
        </div>
    </div>
    <?=  $this->render('_form', compact('model')) ?>
</div>