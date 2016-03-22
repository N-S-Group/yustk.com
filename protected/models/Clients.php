<?php

Yii::import('application.models._base.BaseClients');

class Clients extends BaseClients
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getData(){
        $data = array("user",'clientAgreements'=>array());
        $user = Clients::model()->findByPk( Yii::app()->user->getId() );
        $data['user'] = $user->name;
        if($clientAgreements = ClientAgreements::model()->findAll("`client_id`=:client",array(":client"=>$user->id))){
           foreach($clientAgreements as $key){
               array_push($data['clientAgreements'],array('id'=>$key->id,'name'=>$key->number));
           }
        }
        return $data;
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