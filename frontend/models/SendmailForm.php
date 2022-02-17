<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class SendmailForm extends Model
{
    public $firt_name;
    public $last_name;
    public $email;
    public $subject;
    public $body;

    public function rules()
    {
        return [
            [['first_name','last_name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
        ];
    }

  
    // public function sendEmail($email)
    // {
    //     return Yii::$app->mailer->compose()
    //         ->setTo($email)
    //         ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
    //         ->setReplyTo([$this->email => $this->name])
    //         ->setSubject($this->subject)
    //         ->setTextBody($this->body)
    //         ->send();
    // }
}
