<?php

use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form ActiveForm */
?>
<div class="page-_create_video">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'title')->textInput() ?>
        <?= $form->field($model, 'description')->textarea() ?>
        <?php if ($model->isNewRecord):?>
            <?= FileInput::widget([
                'model' => $model,
                'attribute' => 'upload',
                'pluginOptions' => [
                        'allowedFileExtensions' => ['mp4', 'mpeg-4', 'acc', 'mpeg'],                    'showPreview' => true,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                    'maxFileCount' => 1,
                    'maxFileSize'=>9000000,
                    'extensions' => 'mp4'
                ],
            ]) ?>
        <?php endif; ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- page-_create_video -->
