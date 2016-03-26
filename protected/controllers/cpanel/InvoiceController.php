<?php

class InvoiceController extends ControlerCPanel
{

    public $descriptionActionControlerForView = 'Счета';
    public $clients = array();
    public $edit = false;
    public $list;

    public function getDogovorList(){
        return ClientAgreements::model()->findAll();
    }



	public function actionIndex()
	{
        $this->model = new Invoices();
		$this->render('index');
	}

    public function actionEdit(){
        $this->edit = $_GET['editid'];
        $this->name = 'Редактировать';
        $this->action = 'edit';
        $this->model = Invoices::model()->findByPk( (int)$_GET['editid'] );
        $this->descriptionActionControlerForView = "Редактирование";
        $this->render('edit');
    }


    public function actionEditRecord(){
        if(!Invoices::add($_POST,$_GET['edit'])) $this->save = 'error';
        $this->returnArray['editid'] = $_GET['edit'];
        $this->returnArray['save'] = $this->save;
        $this->redirect( $this->createUrl('edit',$this->returnArray) );
    }


    public function actionadd(){
            if(!Invoices::add($_POST,false)) $this->save = 'error';
            $this->redirect( $this->createurl("index",array("save"=>$this->save)));
    }

    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = Invoices::model()->findAll();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }

    public function actionAjaxDelOne(){
        if(Yii::app()->request->isAjaxRequest){
            if (!Invoices::model()->updateByPk(substr($_GET['cid'],9),array("status"=>3))) $this->return = "/ajaxERROR";
            $this->renderPartial($this->return);
        }
    }

    public function actionAjaxDelAll(){
        if(Yii::app()->request->isAjaxRequest){
            $this->delAll($_GET['cid']);
            $this->renderPartial($this->return);
        }
    }

    private function delAll($array){
        foreach ($array as $item){
            if (!Invoices::model()->updateByPk($item,array("status"=>3))) $this->return = "/ajaxERROR";
        }
    }
}