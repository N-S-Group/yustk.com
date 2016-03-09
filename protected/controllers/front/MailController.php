<?php

class MailController extends Controller
{
	//public $layout='//layouts/front';
    public $title = "";

	public function actionIndex()
	{

		$message='';
		
		if ($_GET['mail']=='ok'){
			$message = MYChtml::showMessage("Отпавленно успешно.");
			}
		elseif($_GET['mail']=='error'){
			$message = MYChtml::showError("Ошибка отправки");
		}
		elseif($_GET['mail']=='captcha'){
			$message = MYChtml::showError("Не верная капча");
		}
			
		$this->render('index',array("message"=>$message));
	}
	
	public function actionSendMail(){

					if($_POST['captcha'] == Yii::app()->session['captcha_keystring']){
						
						$__smtp=Yii::app()->params['smtp'];
						
						Yii::app()->mailer->Host = $__smtp['host'];
						Yii::app()->mailer->Port = $__smtp['port'];
						Yii::app()->mailer->IsSMTP();
						
						if (is_array($_FILES['photos'])) {
							for($i=0;$i<count($_FILES['photos']['name']);$i++){
								Yii::app()->mailer->AddEmbeddedImage($_FILES['photos']['tmp_name'][$i], 'my-attach'.$i, $_FILES['photos']['name'][$i], 'base64', $_FILES['photos']['type'][$i]);
							}
						}
                        Yii::app()->mailer->Subject = "Заявка с сайта.";
						Yii::app()->mailer->SMTPAuth = $__smtp['auth'];
						Yii::app()->mailer->Username = $__smtp['username'];
 						Yii::app()->mailer->Password = $__smtp['password'];
						Yii::app()->mailer->SMTPDebug = $__smtp['debug'];
						Yii::app()->mailer->From = $__smtp['from'];
						Yii::app()->mailer->FromName = $__smtp['fromname'];
						Yii::app()->mailer->AddAddress("bablgum@mail.ru"); //bablgum@mail.ru

						Yii::app()->mailer->MsgHTML($this->renderPartial(Yii::app()->mailer->pathViews, array('post'=>$_POST),true));
						Yii::app()->mailer->CharSet = "windows-1251";
						if(Yii::app()->mailer->send()){
                            $this->render("/static/addad",array("message"=>"Ваша заявка отправлена успешно.", "error"=>false,  "post" => $_POST));
						}else{
                            $this->render("/static/addad",array("message"=>"Неизвестная ошибка при отправке сообщения, повторите позже.", "error"=>true, "post" => $_POST));
						}
					}else{
						$this->render("/static/addad",array("message"=>"Контрольный код введен не верно.", "error"=>true,  "post" => $_POST));
					}
			
	}


    public function actionSendFos(){

        if($_POST['captcha'] == Yii::app()->session['captcha_keystring']){

            $__smtp=Yii::app()->params['smtp'];

            Yii::app()->mailer->Host = $__smtp['host'];
            Yii::app()->mailer->Port = $__smtp['port'];
            Yii::app()->mailer->IsSMTP();


            Yii::app()->mailer->Subject = "Сообщение с сайта.";
            Yii::app()->mailer->SMTPAuth = $__smtp['auth'];
            Yii::app()->mailer->Username = $__smtp['username'];
            Yii::app()->mailer->Password = $__smtp['password'];
            Yii::app()->mailer->SMTPDebug = $__smtp['debug'];
            Yii::app()->mailer->From = $__smtp['from'];
            Yii::app()->mailer->FromName = $__smtp['fromname'];
            Yii::app()->mailer->AddAddress("bablgum@mail.ru"); //bablgum@mail.ru

            Yii::app()->mailer->MsgHTML($this->renderPartial(Yii::app()->mailer->pathViews, array('post'=>$_POST),true));
            Yii::app()->mailer->CharSet = "windows-1251";
            if(Yii::app()->mailer->send()){
                $this->render("/static/addad",array("message"=>"Ваша заявка отправлена успешно1.", "error"=>false,  "post" => $_POST));
            }else{
                $this->render("/static/addad",array("message"=>"Неизвестная ошибка при отправке сообщения, повторите позже.", "error"=>true, "post" => $_POST));
            }
        }else{
            $this->render("/static/addad",array("message"=>"Контрольный код введен не верно.", "error"=>true,  "post" => $_POST));
        }

    }


}