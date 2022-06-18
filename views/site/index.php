<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\Video $model */
/** @var yii\web\View $this */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'YouTube';
?>

<?=
    \yii\widgets\ListView::widget([
        "dataProvider" => $dataProvider,
        'itemView' => 'single_small_video_card',
        'options' => ['class' => "row"],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-lg-4, col-md-4, col-sm-6, col-xs-12'
        ]
    ])
?>

<?php $form = ActiveForm::begin([
    'id' => 'video_form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{input}\n{error}",
        'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
        'inputOptions' => ['class' => 'col-lg-3 form-control'],
        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
    ],
]); ?>

<?= $form->field($model, 'VideoTitle')->textInput(['autofocus' => true, 'required' => true]) ?>
<?= $form->field($model, 'Description')->textInput(['autofocus' => true, 'required' => true]) ?>
<div class="form-group">
    <div class="offset-lg-1 col-lg-11">
        <label for="formFileLg" class="form-label">Upload Video</label>
        <input class="form-control form-control-lg" id="formFileLg" type="file" />
    </div>

</div>
<?php ActiveForm::end(); ?>