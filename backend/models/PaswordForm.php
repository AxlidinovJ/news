<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class PaswordForm extends Model
{
    public $password0;
    public $newpassword1;
    public $newpassword2;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password0', 'newpassword1','newpassword2'],'required','message'=>"Toldirish shart"],
            ['newpassword2', 'compare', 'compareAttribute'=>'newpassword1', 'message'=>"Parollar mos emas" ],

        ];
    }

    public function attributeLabels()
    {
        return [
            'password0' => 'Eski parol',
            'newpassword1' => 'Yangi parol',
            'newpassword2' => 'Yangi parol qayta',
        ];
    }



    
    // protected function sendEmail($user)
    // {
    //     return Yii::$app
    //         ->mailer
    //         ->compose(
    //             ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
    //             ['user' => $user]
    //         )
    //         ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
    //         ->setTo($this->email)
    //         ->setSubject('Account registration at ' . Yii::$app->name)
    //         ->send();
    // }
}
