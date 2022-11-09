<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_model".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $date_reg
 */
class UserModel extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $newPassword;
    public $passwordRepeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['date_reg'], 'date', 'format'=>'php:Y-m-d'],
            [['date_reg'], 'default', 'value' => date('Y-m-d')],
            [['name'], 'string', 'max' => 64],
            [['email', 'password', 'newPassword', 'passwordRepeat'], 'string', 'max' => 100],
            [['newPassword',], 'compare', 'compareAttribute' => 'passwordRepeat', 'message' => 'Passwords do not match'],
            [['passwordRepeat',], 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Passwords do not match'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'date_reg' => 'Date Reg',
        ];
    }

    public static function findIdentity($id)
    {
        return UserModel::findOne($id);
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($name)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $name) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
    
