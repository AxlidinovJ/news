<?php

namespace backend\models;

use Yii;
use yii\base\Model;


class Pasword extends Model
{
    public $pasword;
    public $newpasword1;
    public $newpasword2;
    


    public function rules()
    {
        return [
            [['pasword', 'newpasword1', 'newpasword2'], 'required'],
            ['newpasword2', 'compare', 'compareAttribute'=>'newpasword1', 'message'=>"Passwords don't match" ],

        ];
    }


    public function attributeLabels()
    {
        return [
            'pasword' => 'Eski parol',
            'newpasword1' => 'Yangi parol',
            'newpasword2' => 'Yangi parol qayta',
        ];
    }


}
