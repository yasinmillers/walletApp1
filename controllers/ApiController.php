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

    /**
     * @throws \yii\base\Exception
     */
    public function actionRegister(){

        if ($this::request()->isPost){
            $first_name =$this::request()->post('first_name');
            $second_name =$this::request()->post('second_name');
            $email =$this::request()->post('email');
            $username = $this::request()->post('username');
            $password = $this::request()->post('password');
            $hashed_password= Yii::$app->security->generatePasswordHash($password);
            $authKey = Yii::$app->security->generateRandomString(70).time();
            $accessToken = time().Yii::$app->security->generateRandomString();
            $user = new User();
            $user->first_name = $first_name;
            $user->email=$email;
            $user->password=$hashed_password;
            $user->username=$username;
            $user->authKey = $authKey;
            $user->accessToken=$accessToken;
            $user->last_name = $second_name;
            if ($user->save()){
                return ['success' => "User created", 'user' => $user];
            }
            }

        }
    }

