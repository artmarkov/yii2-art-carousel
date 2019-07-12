<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\carousel\models\Carousel */

$this->title = Yii::t('art', 'Update "{item}"', ['item' => $model->name]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/carousel', 'Carousel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="carousel-update">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>