<?php

Yii::import('application.models._base.BaseGallerySections');

class GallerySections extends BaseGallerySections
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
    public static function getActive(){
        /*$criteria = new CDbCriteria;
        $criteria->with = array('Gallery');
        $criteria->condition = "count(Gallery.id)>0";*/
        return GallerySections::model()->findAll(  );
    }
}