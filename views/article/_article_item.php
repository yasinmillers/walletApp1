<?php


use app\models\Article;

?>

<div>
    <a href="<?php echo \yii\helpers\Url::to(['view', 'id' => $model->id]) ?>">
        <h3><?php echo \yii\helpers\Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords(\yii\helpers\Html::encode($model->body), 40) ?>
    </div>
    <hr>
</div>