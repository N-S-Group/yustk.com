<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 1:30
 * To change this template use File | Settings | File Templates.
 */
class ControlerCPanel extends CController
{

    public $nameControlerForView = "";
    public $descriptionActionControlerForView = "";
    public $name;
    public $edit;
    public $model;
    public $save = 'ok';
    public $return = "//ajaxOK";
    public $returnArray = array();
    public $layout='//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public function filters()
    {
        return array(
            'checkErrors',
            'checkAccess',
           // 'preLoadTree'
        );
    }

    public function filtercheckErrors($filterChain){
         Yii::app()->attachEventHandler('onError',array($this,'handleError'));
         Yii::app()->attachEventHandler('onException',array($this,'handleError'));
        $filterChain->run();
    }

    public function uploadFile($name,$object){

        $info_dir = getcwd().'/uploads/'.$name.'/';

        if(!is_dir($info_dir)) mkdir($info_dir,0770);

        if(!$object->saveAs($info_dir.strtolower($object))) $this->save = 'error';
    }
	
	public function message(){

        if(isset($_GET['save'])) {
            switch ($_GET['save']){
                case 'ok': return MYChtml::showMessage('Сохранено успешно'); break;
                case 'error': return MYChtml::showError('Ошибка сохранения'); break;
            }
            unset($_GET['save']);
        }
    }

    public  function  filterCheckAccess($filterChain) {
        header('Content-Type: text/html; charset=windows-1251');
           if (Yii::app()->user->isGuest) {
            $this->redirect($this->createUrl("/static"));
        }

        $filterChain->run();
        return true;
    }


    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];

            else
                $this->renderPartial('application.views.404.404');
        }
    }

    public function init(){
        parent::init();
        Yii::app()->errorHandler->errorAction=$this->actionError();
    }

    public function handleError(CEvent $event)
    {
        if ($event instanceof CExceptionEvent)
        {
            $statusCode = $event->exception->statusCode;
            $body = array(
                'code' => $event->exception->getCode(),
                'message' => $event->exception->getMessage(),
                'file' => YII_DEBUG ? $event->exception->getFile() : '*',
                'line' => YII_DEBUG ? $event->exception->getLine() : '*'
            );
        }
        elseif($event instanceof CErrorEvent)
        {
            $body = array(
                'code' => $event->code,
                'message' => $event->message,
                'file' => YII_DEBUG ? $event->file : '*',
                'line' => YII_DEBUG ? $event->line : '*'
            );
        }
        $event->handled = TRUE;
        $body['userId'] = ($id = Yii::app()->user->getId())?$id:'isGuest';
        $body['date'] = date("Y-m-d H:i:s");

        $w=fopen('errors.txt','a-');
        fwrite($w,print_r($body,true));
        fclose($w);

        if(Yii::app()->request->isAjaxRequest){
            echo "error";
            die();
        }else{
            $this->renderPartial('application.views.404.404');
            die();
        }
    }

    public function action404(){
        $this->renderPartial('application.views.404.404');
    }

}
