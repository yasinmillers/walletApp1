<?php

   use yii\bootstrap4\ActiveForm;
?>
<div>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <button>Submit</button>
    <?php ActiveForm::end() ?>
</div>
