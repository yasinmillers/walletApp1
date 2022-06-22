<?php

namespace app\controllers;

use app\models\Video;
use Yii;
use yii\web\UploadedFile;

class VideoController extends \yii\web\Controller
{
    /**
     * @throws \yii\base\Exception
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new Video();
        if (Yii::$app->request->isPost && $model->load(\Yii::$app->request->post())){
            $model->upload =UploadedFile::getInstance($model, 'upload');
            if ($model->upload() && $model->save(false)){
                Yii::$app->session->setFlash("success", "Video uploaded successfully");
                return $this->refresh();
            }
            return $this->redirect(['view','id'=>$model->video_id]);
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
