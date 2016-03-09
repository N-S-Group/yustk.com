<?php
class ErrorController extends CController
{

    public $layout='//layouts/error404';


    public function actions()
    {

    }


    public function actionIndex()
    {

    $this->render("index");
    }

}