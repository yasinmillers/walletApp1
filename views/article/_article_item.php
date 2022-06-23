<?php


use app\models\Article;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div>
    <a href="<?php echo Url::to(['view', 'id' => $model->id]) ?>">
        <h3><?php echo Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?php echo StringHelper::truncateWords(Html::encode($model->body), 40) ?>
    </div>
    <hr>
</div>