<?php

namespace backend\models;

use Yii;

class User extends \yii\db\ActiveRecord
{
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
            [['name','username','email'], 'required'],
            [['education', 'location', 'username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['name','username'],'string','max'=>'30','min'=>'5']
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
            'img' => 'Img',
            'education' => 'Education',
            'location' => 'Location',
            'username' => 'Username',
            'email' => 'Email',
        ];
    }
}
