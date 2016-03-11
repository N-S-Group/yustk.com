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

        $model = Comments::getModelByPk($_GET['editid']);
        if ($_GET["confirm"] == 1) {
            Comments::confirmModelByPk($_GET['editid']);
        }

        if ($_GET["save"] == 1) {
            $model->attributes = $_POST;
            $model->save();

        }

        header('Content-Type: text/html; charset=windows-1251');
        $this->render("_form",array('model'=> $model));
    }

    public function actionEditRecord(){
        if(Yii::app()->request->isAjaxRequest){
            $status = Comments::editModelByPk($_POST['id'])?"/ajaxOK":"/ajaxERROR";
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