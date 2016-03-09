<?php

class CommentsController extends ControlerCPanel
{
    public $descriptionActionControlerForView = 'Îòçûâû';

    public function actionIndex()
    {
        $this->name = '';
        $this->render('index');
    }

    public function actionEdit()
    {
        header('Content-Type: text/html; charset=windows-1251');
        $this->renderPartial("_form",array('model'=>Comments::getModelByPk($_GET['id'])));
    }

    public function actionEditRecord(){
        if(Yii::app()->request->isAjaxRequest){
            $status = Comments::editModelByPk($_POST['id'])?"/ajaxOK":"/ajaxERROR";
            $this->renderPartial($status);
        }
    }

    public function actionconfirmRecord(){
        if(Yii::app()->request->isAjaxRequest){
            $status = Comments::confirmModelByPk($_POST['id'])?"/ajaxOK":"/ajaxERROR";
            $this->renderPartial($status);
        }
    }

    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = Comments::model()->findAll(array('order'=>'id desc'));
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }

    public function actionAjaxDelOne(){
        if(Yii::app()->request->isAjaxRequest){
            if (!Comments::model()->updateByPk(substr($_GET['cid'],9),array("delete"=>1))) $this->return = "/ajaxERROR";
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
            if (!Comments::model()->updateByPk($item,array("delete"=>1))) $this->return = "/ajaxERROR";
        }
    }
}