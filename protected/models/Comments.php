<?php

Yii::import('application.models._base.BaseComments');

class Comments extends BaseComments
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

    public static function editModelByPk($id){
        $model = self::getModelByPk($id);
        $model->text = MYChtml::toWindows1251(trim($_POST['text']));
        return $model->save();
    }

    public static function getModelByPk($id){
        return Comments::model()->findByPk($id);
    }

    public static function confirmModelByPk($id){
        $model = self::getModelByPk($id);
        $model->confirm = 1;
        return $model->save();
    }

    public function relations() {
        return array(
            'Users' => array(self::BELONGS_TO, 'Users', 'user_create'),
        );
    }
}