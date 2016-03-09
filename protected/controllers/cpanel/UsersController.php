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
        $this->edit = $_GET['editid'];
        $this->name = 'Редактировать пользователя';
        $this->action = 'edit';
        $role = Roles::model()->findAll();
        $this->model = Users::model()->findByPk( (int)$_GET['editid'] );
        $this->render('edit',array('role'=>$role));
    }

    public function actionEditRecord(){

        $model = Users::model()->findByPk( (int)$_GET['edit'] );

        $model->attributes = $_POST;

        $model->phone = AccessoryFunctions::clearTel($_POST['phone']);

        if( strlen($_POST['pass']) >0 ) $model->password = $model->createPassword($_POST['pass']);

        if(!$model->save()) $this->save = "error";

        $this->returnArray['editid'] = (int)$_GET['edit'];

        $this->returnArray['save'] = $this->save;

        $this->redirect( $this->createUrl('edit',$this->returnArray) );

    }

    public function actionAdd(){
        $model = new Users;
        $model->attributes = $_POST;
        $model->phone = AccessoryFunctions::clearTel($_POST['phone']);
        $model->password = $model->createPassword($_POST['pass']);
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
            if (!Users::model()->updateByPk(substr($_GET['cid'],9),array("delete"=>1))) $this->return = "/ajaxERROR";
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
            if (!Users::model()->updateByPk($item,array("delete"=>1))) $this->return = "/ajaxERROR";
        }
    }
}