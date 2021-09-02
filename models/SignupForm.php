<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $cpassword;

    public function rules()
    {
        return [
            [['username','password','cpassword'],'required'],
            [['username','password','cpassword'],'string','min'=>4,'max'=>20],
            ['cpassword','compare','compareAttribute'=>'password']
        ];
    }

    public function signup(){
    $user = new User();
    $user->username = $this->username;
    $user->password = \Yii::$app->security->generatePasswordHash($this->password);
    $user->auth_key = \Yii::$app->security->generateRandomString();
    $user->access_token = \Yii::$app->security->generateRandomString();


    if($user->save()){
        return true;
    }

    \Yii::error("User has not been saved! ". VarDumper::dumpAsString($user->errors));
    return false;
    }
}