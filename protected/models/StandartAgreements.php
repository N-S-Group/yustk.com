<?php

Yii::import('application.models._base.BaseStandartAgreements');

class StandartAgreements extends BaseStandartAgreements
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getData(){
        return StandartAgreements::model()->findAll();
    }

    public $agreements;

    private static function rename(){//переименование загружаемых файлов
        if(strlen($_FILES['StandartAgreements']['name']['agreements'])>0 ) $_FILES['StandartAgreements']['name']['agreements'] = 'agreements'.preg_replace('/(^.*)(\.)/','$2',$_FILES['StandartAgreements']['name']['agreements']);
    }

    public static function add($post,$id = false){

        $model = ($id)?StandartAgreements::model()->findByPk( $id ):new StandartAgreements;

        return self::formData($model,$post);
    }

    public static function formData($model,$post){
        self::rename();
        $model->name = MYChtml::filterJSON($post['name']);
        $model->agreements = CUploadedFile::getInstance($model,'agreements');
        if(!$model->date) $model->date = new CDbExpression("now()");
        if(strlen($_FILES['StandartAgreements']['name']['agreements'])>0) $model->filename = $_FILES['StandartAgreements']['name']['agreements'];
        if(!$model->save()) return false;
        if($model->agreements!=NULL) return MYFiles::uploadFile('agreements/'.$model->id,$model->agreements);
        return true;
    }

    public function defaultScope()
    {
        return array(
            'condition'=>"`delete`=0"
        );
    }
}