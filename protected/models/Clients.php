<?php

Yii::import('application.models._base.BaseClients');

class Clients extends BaseClients
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}


    public function defaultScope()
    {
        return array(
            'condition'=>"`delete`=0",
        );
    }

    public static function getGenerate($id,$g){
        return Clients::model()->find("id=:id and generate=:generate",array(":id"=>(int)$id,":generate"=>$g));
    }
}