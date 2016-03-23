<?php

class OrdersController extends ControlerCPanel
{

    public $descriptionActionControlerForView = 'Список заявок';
    public $clients = array();
    public $edit = false;

	public function actionIndex()
	{
		$this->render('index');
	}


    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = Orders::model()->findAll(array("order"=>"id desc"));
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }
}