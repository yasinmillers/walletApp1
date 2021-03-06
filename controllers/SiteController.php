<?php

namespace app\controllers;

use app\models\UploadImageForm;
use app\models\User;
use app\models\Video;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Video();
        // fetched all videos from all the db
        $videos = Video::find()->orderBy('created_at DESC');
        $dataProvider = new ActiveDataProvider([
            'query' => $videos,
            'pagination' => ['pageSize' => 16]
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new Video();

        return $this->render('index', ['model' => $model]);
        //TODO create a video form submit it,upload the video and redirect to index page
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'authlayerout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $request = Yii::$app->request;
        $model = new User();
        if ($request->isPost && $model->load($request->post())) {
            $username = $model->username;
            //check username
            $check_1 = User::findByUsername($username);
            if ($check_1) {
                // checking the password
                if ($check_1->validatePassword($model->password)) {
                    // the passwords are matching, login the user
                    Yii::$app->user->login($check_1);
                    Yii::$app->session->setFlash("success", "Logged in");
                } else {
                    Yii::$app->session->setFlash("error", "Mo user associated with the given password");
                }
            } else {
                Yii::$app->session->setFlash("error", "Mo user associated with the given username");
            }
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @throws \yii\base\Exception
     */
    public function actionRegister()
    {
        $this->layout = 'authlayerout';
        $model = new User();
        $request = Yii::$app->request;
        if ($request->isPost && $model->load($request->post())) {
            $model->password = Yii::$app->security->generatePasswordHash($model->password);
            $model->authKey = Yii::$app->security->generateRandomString(70) . time();
            $model->accessToken = time() . Yii::$app->security->generateRandomString();
            if ($model->save()) {
                Yii::$app->session->setFlash("success", "Account created successfully, login now");
                return $this->redirect(['login']);
            }
        }

        return $this->render('register', ['model' => $model]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionVideo()
    {


        // renders a view named "view" and applies a layout to it
        return $this->render('video', []);
    }



    public function actionUpload()
    {
        $model = new UploadImageForm();
        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                // file is uploaded successfully
                echo "File successfully uploaded";
                return;
            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}
