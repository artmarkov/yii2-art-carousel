<?php

use artsoft\widgets\ActiveForm;
use artsoft\carousel\models\Carousel;
use artsoft\helpers\Html;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model artsoft\carousel\models\Carousel */
/* @var $form artsoft\widgets\ActiveForm */
//https://toster.ru/q/569522
?>

<div class="carousel-form">

    <?php 
    $form = ActiveForm::begin([
            'id' => 'carousel-form',
            'validateOnBlur' => false,
        ])
    ?>

    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>                     

                </div>
            </div>
            
            <?php if (!$model->isNewRecord) : ?>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= \artsoft\mediamanager\widgets\MediaManagerWidget::widget(['model' => $model]); ?>
                    
                </div> 
            </div>
            
            <?php endif; ?>
            
        </div>

        <div class="col-md-4">            
                    
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">
                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;"><?=  $model->attributeLabels()['id'] ?>: </label>
                            <span><?=  $model->id ?></span>
                        </div>
                        <?php if (!$model->isNewRecord): ?>

                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['created_at'] ?> :
                            </label>
                            <span><?= $model->createdDatetime ?></span>
                        </div>

                        <div class="form-group clearfix">
                            <label class="control-label" style="float: left; padding-right: 5px;">
                                <?= $model->attributeLabels()['updated_at'] ?> :
                            </label>
                            <span><?= $model->updatedDatetime ?></span>
                        </div>

                        <div class="form-group clearfix">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['updated_by'] ?> :
                                </label>
                                <span><?= $model->updatedBy->username ?></span>
                        </div>
                        
                        <?php endif; ?>
                    
                       
                                
                        
                        <div class="form-group">
                            <?php  if ($model->isNewRecord): ?>
                                <?= Html::submitButton(Yii::t('art', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('art', 'Cancel'), ['/carousel/default/index'], ['class' => 'btn btn-default']) ?>
                            <?php  else: ?>
                                <?= Html::submitButton(Yii::t('art', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('art', 'Delete'),
                                    ['/carousel/default/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-default',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    
                        <?= $form->field($model->loadDefaultValues(), 'status')->dropDownList(Carousel::getStatusList()) ?>

                        <?= $form->field($model, 'items')->textInput() ?>
                     
                        <?= $form->field($model, 'transition_style')->textInput(['maxlength' => true])->hint('fade, backSlide, goDown, fadeUp') ?>

                        <?= $form->field($model, 'auto_play')->textInput(['maxlength' => true]) ?>
                        
                        
                        <div class="row">
                            <div class="col-md-12 col-lg-4 "> 
                        <?= $form->field($model, 'single_item')->widget(SwitchInput::classname(), [
                        'pluginOptions' => [
                            'size' => 'small',
                        ],
                        ]); ?>                                 
                            </div>
                            <div class="col-md-12 col-lg-4 "> 
                        <?= $form->field($model, 'navigation')->widget(SwitchInput::classname(), [
                        'pluginOptions' => [
                            'size' => 'small',
                        ],
                        ]); ?>                                 
                            </div>
                            <div class="col-md-12 col-lg-4 ">
                        <?= $form->field($model, 'pagination')->widget(SwitchInput::classname(), [
                        'pluginOptions' => [
                            'size' => 'small',
                        ],
                        ]); ?>                                                              
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>

    <?php  ActiveForm::end(); ?>

</div>
