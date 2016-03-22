<?php

class UsersController extends ControlerCPanel
{
    public $descriptionActionControlerForView = 'Пользователи';

    public function actionIndex()
    {
        $this->name = 'Создание пользователя';
        $role = Roles::model()->findAll();
        $this->render('index',array('role'=>$role));
    }

    public function actionEdit()
    {
        if((!isset($_GET['cl']) OR !in_array($_GET['cl'],array(1,2))) OR !isset($_GET['editid'])) $this->redirect( $this->createUrl('index') );
        $this->edit = $_GET['editid'];
        $this->name = 'Редактировать пользователя';
        $this->action = 'edit';
        $this->model = (isset($_GET['cl']) && $_GET['cl'] == 1 )?Clients::model()->findByPk( (int)$_GET['editid'] ):Users::model()->findByPk( (int)$_GET['editid'] );
        $this->render('edit');
    }

    public function toUsers($model,$id,$post){
        $m = new Users;
        $m->setAttributes( $model->getAttributes() );
        $m->phone = AccessoryFunctions::clearTel($post['phone']);
        $model = $m;
        $model->role = 4;
        Clients::model()->updateByPk($id,array("delete"=>1));
        return $model;
    }

    public function toClient($model,$id,$post){
        $m = new Clients;
        $m->setAttributes( $model->getAttributes() );
        $m->inn = $post['inn'];
        $model = $m;
        Users::model()->updateByPk($id,array("delete"=>1));
        return $model;
    }

    public function actionEditRecord(){
        $model = (isset($_GET['cl']) && $_GET['cl'] == 1)?Clients::model()->findByPk( (int)$_GET['edit'] ):Users::model()->findByPk( (int)$_GET['edit'] );
        $model->attributes = $_POST;
        $model->name = MYChtml::filterJSON($_POST['name']);
        if($_GET['cl'] == 1 && $_POST['role'] == 4) $model = $this->toUsers($model,$_GET['edit'],$_POST);
        if($_GET['cl'] == 2 && $_POST['role'] == 1) $model = $this->toClient($model,$_GET['edit'],$_POST);
        if(isset($_GET['cl']) && $_GET['cl'] == 2 && $_POST['role'] == 4) $model->phone = AccessoryFunctions::clearTel($_POST['phone']);
        if( strlen($_POST['pass']) >0 ) $model->password = md5($_POST['pass']);
        if(!$model->save()) $this->save = "error";
        $this->returnArray['editid'] = $model->id;
        $this->returnArray['cl'] = $_POST['role'] == 1?1:2;
        $this->returnArray['save'] = $this->save;
        $this->redirect( $this->createUrl('edit',$this->returnArray) );
    }

    public function actionAdd(){
        $model = $_POST['role'] == 1?new Clients:new Users;
        $model->attributes = $_POST;
        $model->name = MYChtml::filterJSON($_POST['name']);
        if($_POST['role'] == 4) $model->phone = AccessoryFunctions::clearTel($_POST['phone']);
        $model->password = md5($_POST['pass']);
        if(!$model->save()) $this->save = "error";
        $this->redirect( $this->createUrl('index',array('save'=>$this->save)) );
    }

    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = Users::model()->findAll();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }

    public function actionAjaxDelOne(){
        if(Yii::app()->request->isAjaxRequest){
            $model = substr($_GET['cid'],0,9) == 'clForSend'?'Clients':'Users';
            if (!CActiveRecord::model($model)->updateByPk(substr($_GET['cid'],9),array("delete"=>1))) $this->return = "/ajaxERROR";
            $this->renderPartial($this->return);
        }
    }

    public function actionAjaxDelAll() {
        if(Yii::app()->request->isAjaxRequest){
            $this->delAll($_GET['cid']);
            $this->renderPartial($this->return);
        }
    }

    private function delAll($array){
        foreach ($array as $item){
            $model = substr($item,0,2) == 'cl'?'Clients':'Users';
            if (!CActiveRecord::model($model)->updateByPk(substr($item,2),array("delete"=>1))) $this->return = "/ajaxERROR";
        }
    }
}