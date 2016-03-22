<?php

class StandartAgreementsController extends ControlerCPanel
{

    public $descriptionActionControlerForView = 'Типовые договора';
    public $clients = array();
    public $edit = false;

	public function actionIndex()
	{
        $this->model = new StandartAgreements();
		$this->render('index');
	}

    public function actionEdit(){
        $this->edit = $_GET['editid'];
        $this->name = 'Редактировать';
        $this->action = 'edit';
        $this->model = StandartAgreements::model()->findByPk( (int)$_GET['editid'] );
        $this->descriptionActionControlerForView = "Редактирование записи '".$this->model->name."'";
        $this->render('edit');
    }


    public function actionEditRecord(){
        if(!StandartAgreements::add($_POST,$_GET['edit'])) $this->save = 'error';
        $this->returnArray['editid'] = $_GET['edit'];
        $this->returnArray['save'] = $this->save;
        $this->redirect( $this->createUrl('edit',$this->returnArray) );
    }


    public function actionadd(){
            if(!StandartAgreements::add($_POST,false)) $this->save = 'error';
            $this->redirect( $this->createurl("index",array("save"=>$this->save)));
    }

    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = StandartAgreements::model()->findAll();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }

    public function actionAjaxDelOne(){
        if(Yii::app()->request->isAjaxRequest){
            if (!StandartAgreements::model()->updateByPk(substr($_GET['cid'],9),array("delete"=>1))) $this->return = "/ajaxERROR";
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
            if (!StandartAgreements::model()->updateByPk($item,array("delete"=>1))) $this->return = "/ajaxERROR";
        }
    }
}