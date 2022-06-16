<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function findByUsername($username)
    {
//        TODO teach brian what this does.
        return User::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password','email'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password'], 'string', 'max' => 200],
            [['authKey', 'accessToken','email'], 'string', 'max' => 100],
            [['first_name', 'last_name'], 'string', 'max' => 40, 'min' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'email'=>'Email',
        ];
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO Find out the rest of the implementation of this functionality using type param
        return User::findOne(['accessToken' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey == $authKey;
    }

    /**
     * @throws
     * Comparer ......
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
