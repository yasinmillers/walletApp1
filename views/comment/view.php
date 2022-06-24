<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'body',
            'created_at',
            'created_by',
            'article_id',
            'pinned',
        ],
    ]) ?>
    <div class="comments mt-5">
        <h4 class="mb-3"> <span id="comment-count"></span> Comments</h4>
        <div class="create-comment mb-4">
            <div class="media">
                <img class="mr-3 comment-avatar" src="/img/avatar.png" alt="">
                <div class="media-body">
                    <form class="create-comment-form" method="post"

                        <input type="hidden" name="video_id" value="">
                        <textarea rows="1"
                                  class="form-control comment-input"
                                  name="comment"
                                  placeholder="Add a public comment"></textarea>
                        <div class="action-buttons text-right mt-2">
                            <button type="button" class="btn btn-light btn-cancel">Cancel</button>
                            <button class="btn btn-primary btn-save">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
