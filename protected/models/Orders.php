<?php

Yii::import('application.models._base.BaseOrders');

class Orders extends BaseOrders
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    static function formDateInBase($date){
        $e = explode(".",$date);
        return $e[2]."-".$e[1]."-".$e[0];
    }

    static function add($post,$parse_str){
        $model = new Orders();
        $model->date = (isset($parse_str['date']))?self::formDateInBase($parse_str['date']):new CDbExpression("now()");
        $model->agreement_id = $post['order'];
        $model->type =  $post['request'];
        $n =  TypesOrders::model()->findByPk($post['request']);
        $model->name = $n->name;
        if($model->type == 2){
            $model->my_bunkers = (int)$parse_str['my_bunker'];
            $model->order_bunker = (int)$parse_str['bunker'];
            $model->address = MYChtml::fromUTF8($parse_str['address']);
            $model->description = MYChtml::fromUTF8($parse_str['description']);
        }else{
            $model->date_start = self::formDateInBase($parse_str['date_start']);
            $model->date_end = self::formDateInBase($parse_str['date_end']);
        }
        return $model->save()?$model:0;
    }
}