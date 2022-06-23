<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dev_blog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if(!Yii::$app->user->isGuest):?>
    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif;?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article_item',
        'options' => [
                'class' => "row"
        ],
        'layout' => "{items}\n{pager}",
        'itemOptions' => [
                //'tag' => 'div',
                //'class' => "col-lg-3 col-md-4 col-sm-6 col-xs-12"
        ]

    ]); ?>


</div>
