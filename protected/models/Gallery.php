<?php

Yii::import('application.models._base.BaseGallery');

class Gallery extends BaseGallery
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function defaultScope()
    {
        return array(
            'condition'=>"`delete`=0",
            'order'=>"id desc"
        );
    }

    public function getImages($id){
        $criteria = new CDbCriteria;
        $criteria->order = 'id desc';
        if((int)$id) $criteria->condition = 'section='.$id;
        return Gallery::model()->findAll($criteria);
    }
}