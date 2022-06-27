<?php

namespace app\controllers;

use app\models\User;
use phpDocumentor\Reflection\Types\This;
use Yii;

class ApiController extends \yii\rest\Controller
{
    public static function request()
    {
        return \Yii::$app->request;
    }

    public function actionLogin()
    {
        if ($this::request()->isPost){
            $username = $this::request()->post('username');
            $req_password = $this::request()->post('password');
            //check username
            $check_1 = User::findByUsername($username); // low level caching
            if ($check_1){
                // checking the password
                if ($check_1->validatePassword($req_password)){
                    // the passwords are matching, login the user
                    // creating jwt
                    return [
                        'username' => $check_1->username,
                        'token' => base64_encode($check_1->accessToken)
                    ];
                }else{
                    return ['error' => 'Wrong password'];
                }
            }else{
                return ['error' => 'Incorrect username'];
            }
        }
    }
    public function actionRegister(){

        if ($this::request()->isPost){
            $first_name =$this::request()->post('first_name');
            $second_name =$this::request()->post('second_name');
            $email =$this::request()->post('email');
            $username = $this::request()->post('username');
            $password= Yii::$app->security->generatePasswordHash('password');
            $this->request->authKey = Yii::$app->security->generateRandomString(70).time();
            $this->request->accessToken = time().Yii::$app->security->generateRandomString();


            //$password = Yii::$app->security->generatePasswordHash(password);
            //$this->request->authKey = Yii::$app->security->generateRandomString(70).time();
            //$this->request->accessToken = time().Yii::$app->security->generateRandomString();

            $save_1= User::updateAll($first_name,$second_name,$email,$username,$password,authkey,accessToken);

            }

        }
    }

