<?php

Yii::import('application.models._base.BaseOrders');

class Orders extends BaseOrders
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    static function add($post){
        $model = new Orders();
        $model->date =  new CDbExpression("now()");
        $model->agreement_id = $post['order'];
        $model->type =  $post['request'];
        $n =  TypesOrders::model()->findByPk($post['request']);
        $model->name = $n->name;
        return $model->save()?$model:0;
    }
}