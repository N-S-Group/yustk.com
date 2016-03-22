<?php

class ClientAgreementsController extends ControlerCPanel
{

    public $descriptionActionControlerForView = 'Договора';
    public $clients = array();

    public function getClients(){
        return Clients::model()->findAll();
    }

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionEdit()
    {
        $this->edit = $_GET['editid'];
        $this->name = 'Редактировать';
        $this->action = 'edit';
        $this->model = ClientAgreements::model()->findByPk( (int)$_GET['editid'] );
        $this->descriptionActionControlerForView = "Редактирование записи '".$this->model->name."'";
        $this->render('edit');
    }

    public function actionEditRecord(){
        $model = ClientAgreements::model()->findByPk($_GET['edit']);
        $model = $this->formData($model,$_POST);
        if(!$model->save()) $this->save = "error";
        $this->returnArray['editid'] = $model->id;
        $this->returnArray['save'] = $this->save;
        $this->redirect( $this->createUrl('edit',$this->returnArray) );
    }

    public function formData($model,$post){
        $model->name = trim(MYChtml::filter($post['name']));
        $model->number = trim($post['number']);
        $model->client_id = $post['client_id'];
        return $model;
    }

        public function actionadd(){
            $model = new ClientAgreements;
            $model = $this->formData($model,$_POST);
            $model->date = new CDbExpression("now()");
            if(!$model->save()) $this->save = "error";
            $this->redirect( $this->createurl("index",array("save"=>$this->save)));
        }

    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = ClientAgreements::model()->findAll();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }

    public function actionAjaxDelOne(){
        if(Yii::app()->request->isAjaxRequest){
            if (!ClientAgreements::model()->updateByPk(substr($_GET['cid'],9),array("delete"=>1))) $this->return = "/ajaxERROR";
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
            if (!ClientAgreements::model()->updateByPk($item,array("delete"=>1))) $this->return = "/ajaxERROR";
        }
    }
}