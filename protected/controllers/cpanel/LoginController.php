<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 2:11
 * To change this template use File | Settings | File Templates.
 */
class LoginController extends CController
{

    public $layout='//layouts/login';
    public $url = "/users";

       public function actionIndex()
    {
        header('Content-Type: text/html; charset=windows-1251');
        $model=new LoginForm();

        if(isset($_POST['loginForm']))
        {
            $model->attributes=$_POST['loginForm'];

            if($model->Login()){

                switch (Yii::app()->user->role){
                    case 1: $this->url = '/users'; break;
                    case 7: $this->url = '/users'; break;
                }

                $this->redirect($this->createUrl($this->url));
            }

        }
        $this->render('index', array("model"=>$model));
    }


    public function actionExit()
    {
        // renders the view file 'protected/views/front/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        Yii::app()->user->logout();
        $this->redirect($this->createUrl("."));
    }



}
