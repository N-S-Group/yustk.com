<?php
class ErrorController extends CController
{

    public $layout='//layouts/error404';


    public function actions()
    {

    }


    public function actionIndex()
    {

        $this->renderPartial('application.views.404.404');
    }

}