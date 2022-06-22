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
