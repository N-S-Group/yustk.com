<?php

class ServiceController extends ControlerCPanel
{

    public $descriptionActionControlerForView = '����������� ��� � ������� �� ������';


	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionEdit()
    {
        $this->edit = $_GET['editid'];
        $this->name = '�������������';
        $this->action = 'edit';
        $this->model = Service::model()->findByPk( (int)$_GET['editid'] );
        $this->descriptionActionControlerForView = "�������������� ������ '".$this->model->title."'";
        $this->render('edit');
    }

    public function actionEditRecord(){
        $model = Service::model()->findByPk($_GET['edit']);
        $model = $this->formData($model,$_POST);
        if(!$model->save()) $this->save = "error";
        $this->returnArray['editid'] = $model->id;
        $this->returnArray['save'] = $this->save;
        $this->redirect( $this->createUrl('edit',$this->returnArray) );
    }

    public function formData($model,$post){
        $model->title = trim(MYChtml::filter($post['title']));
        $model->unit = trim($post['unit']);
        $model->description = trim($post['description']);
        $model->price = ereg_replace(",",".",trim($post['price']));
        if($model->price == '') $model->price = 0.00;
        return $model;
    }

        public function actionadd(){
            $model = new Service;
            $model = $this->formData($model,$_POST);
            if(!$model->save(false)) $this->save = "error";
            $this->redirect( $this->createurl("index",array("save"=>$this->save)));
        }

    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = Service::model()->findAll('pid is null');
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }

    public function actionAjaxDelOne(){
        if(Yii::app()->request->isAjaxRequest){
            if (!Service::model()->updateByPk(substr($_GET['cid'],9),array("delete"=>1))) $this->return = "/ajaxERROR";
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
            if (!Service::model()->updateByPk($item,array("delete"=>1))) $this->return = "/ajaxERROR";
        }
    }
}