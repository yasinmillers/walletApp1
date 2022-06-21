<?php

   use yii\bootstrap4\ActiveForm;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>
<?= $form->field($model, 'image')->fileInput() ?>
    <button>Submit</button>
<?php ActiveForm::end() ?>