<?php

namespace app\models;

use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public $_id;
    public $_name;
    public $_email;
    public $_password;
    public $_is_admin;
    public $_created_at;
    public $_modified_at;
    public $_deleted_at;

    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 255],
            [['is_admin'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('user', 'ID'),
            'name' => Yii::t('user', 'Username'),
            'email' => Yii::t('user', 'Email'),
            'is_admin' => Yii::t('user', 'Admin'),
            'password' => Yii::t('user', 'Password'),
            'created_at' => Yii::t('user', 'Created At'),
            'updated_at' => Yii::t('user', 'Updated At'),
            'deleted_at' => Yii::t('user', 'Deleted At'),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('Not supported action!');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['name' => $username]);
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
        return md5($this->id . $this->email);
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return md5($this->id . $this->email) === $authKey;
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

    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'created_at' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'value' => function ($event) {
//                    return gmdate("Y-m-d H:i:s");
//                },
//            ],
//            'modified_at' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'value' => function ($event) {
//                    return gmdate("Y-m-d H:i:s");
//                },
//            ],
//            'deleted_at' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'value' => function ($event) {
//                    return gmdate("Y-m-d H:i:s");
//                },
//            ],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
//        if (!isset($this->created_at)) {
//            $this->created_at = date('Y-m-d H:i:s');
//        }
//
//        $this->modified_at = date('Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }
}
