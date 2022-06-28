<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">


    <div>
        <h1><?php echo Html::encode($model->title) ?></h1>
        <p class="text-muted">
            <small>
                Created at: <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
                By: <?php echo $model->createdBy->username ?>

            </small>
        </p>
        <div>
            <?php echo Html::encode($model->body); ?>

        </div>
    </div>

</div>
<p class="btn mt-4">
    <?php
    if (!Yii::$app->user->isGuest):
    echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]);
    endif;
    ?>
</p>
<div class="comments mt-4">
    <h4 class="mb-3"> <span id="comment-count"></span> Comments</h4>
    <div class="create-comment mb-4">
        <div class="media">
            <img class="mr-3 comment-avatar" src="/img/avatar.png" alt="">
            <div class="media-body">
                <?= $this->render('/comment/_form', ['model' => $commentModel]) ?>
            </div>
        </div>
    </div>

</div>

<?php foreach ($model->comments as $comment): ?>
<div class="card mr-1" >
    <div class="card-header ">
        <h2 class="card-title">
            Comment by <?= $comment->createdBy->username ?>,  <?= Yii::$app->formatter->asRelativeTime($comment->created_at)?>
        </h2>
    </div>
    <div class="card-body card-text" >
        <?= $comment->body ?>
    </div>
</div>
<?php endforeach; ?>

