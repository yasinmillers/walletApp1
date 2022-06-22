<?php
?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title"><?= $model->title ?></h1>
    </div>
    <div class="card-body card-text text-truncate">
        <?= $model->body ?>
    </div>
    <div class="card-footer">
        <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?>
    </div>
</div>
