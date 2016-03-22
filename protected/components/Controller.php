<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
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
            'preLoadTree'
        );
    }

    public function filtercheckErrors($filterChain){
        Yii::app()->attachEventHandler('onError',array($this,'handleError'));
        Yii::app()->attachEventHandler('onException',array($this,'handleError'));
        $filterChain->run();
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
       // Yii::app()->errorHandler->errorAction=$this->actionError();
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