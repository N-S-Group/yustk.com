<?php

Yii::import('application.models._base.BaseUsers');

class Users extends BaseUsers
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function  createPassword($pass){
        return  md5($pass);
    }

    public function defaultScope()
    {
        return array(
            'condition'=>"`delete`=0",
        );
    }

    public function validatePassword($password){

        return $this->hashPassword($password)===$this->password;

    }

    public function hashPassword($password){

        return  md5($password);
    }
}