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

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id === $model->created_by): ?>
        <p>
            <?php echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif ?>

    <div>
        <h1><?php echo Html::encode($model->title) ?></h1>
        <p class="text-muted">
            <small>
                Created at: <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>

            </small>
        </p>
        <div>
            <?php echo Html::encode($model->body); ?>
        </div>
    </div>

</div>
<p>
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
    <?php if(isset($_POST['previewComment']) && !$comment->hasErrors()): ?>
    <h3>Preview</h3>
    <div class="comment">
        <div class="author"><?php echo $comment->authorLink; ?> says:</div>
        <div class="time"><?php echo date('F j, Y \a\t h:i a',$comment->createTime); ?></div>
        <div class="content"><?php echo $comment->contentDisplay; ?></div>
    </div><!-- post preview -->
<?php endif; ?>
</p>