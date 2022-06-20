<?php

namespace app\controllers;

use app\models\Video;

class VideoController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = new Video();
        if (\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post())){

        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionDetail()
    {
        return $this->render('detail');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLike()
    {
        return $this->render('like');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}