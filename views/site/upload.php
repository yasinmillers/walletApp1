<?php

   use yii\bootstrap4\ActiveForm;
?>
<div class="upload-icon">
    <i class="fa fa-upload" aria-hidden="true"></i>
</div>
<div class="upload">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <button class="btn btn-success">Submit</button>
    <?php ActiveForm::end() ?>
</div>
