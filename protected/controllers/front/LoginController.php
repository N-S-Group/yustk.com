<?php
class LoginController extends Controller
{

        public function inCabinet(){
            $this->redirect($this->createUrl('/cpanel/'));
        }

        public function echoAjaxMessage($message){
            echo $message;
            die();
        }

        public function actionIndex()
        {
           $model = new loginFormClients();

            if (isset($_POST['login'])){
                $model->login = iconv("UTF-8","windows-1251",$_POST['login']);
                $model->password = $_POST['password'];
                //$valid = $model->validate();
                if ($model->authenticate()){
                    $this->echoAjaxMessage(3);
                }
            }
           $this->echoAjaxMessage(2);
        }

        public function redirection($url,$array){
            $this->redirect( $this->createUrl($url,$array) );
        }

        public function actionRestore(){
            if(!$m = Clients::model()->find("`email`=:email",array(":email"=>$_POST['email']))) $this->echoAjaxMessage(10);
            $m->generate = md5(rand(0,99));
            if($m->save()){
           //     MYMail::MailerTo($m->email,"Письмо для восстановления пароля на сайте yustk.com");

                $__smtp=Yii::app()->params['smtp'];
                Yii::app()->mailer->Host = $__smtp['host'];
                Yii::app()->mailer->Port = $__smtp['port'];
                Yii::app()->mailer->IsSMTP();

                Yii::app()->mailer->Subject = "Письмо для восстановления пароля на сайте yustk.com";//"Обращение к директору с сайта yustk.com";
                Yii::app()->mailer->SMTPAuth = $__smtp['auth'];
                Yii::app()->mailer->Username = $__smtp['username'];
                Yii::app()->mailer->Password = $__smtp['password'];
                Yii::app()->mailer->SMTPDebug = $__smtp['debug'];
                Yii::app()->mailer->From = $__smtp['from'];
                Yii::app()->mailer->FromName = $__smtp['fromname'];
                Yii::app()->mailer->AddAddress($m->email); //bablgum@mail.ru
                Yii::app()->mailer->CharSet = "windows-1251";


                Yii::app()->mailer->MsgHTML($this->renderPartial(Yii::app()->mailer->recoveryPassword, array('generate'=>$m->generate,'id'=>$m->id),true));
                if(Yii::app()->mailer->send()){
                    $this->echoAjaxMessage(11);
                }else{
                    $this->echoAjaxMessage(12);
                }
            }
        }

	    public function actionExit()
	    {
	        Yii::app()->user->logout();
	        $this->redirect($this->createUrl("/static"));
	    }
}