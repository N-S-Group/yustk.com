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
                    if(isset($_POST['s']) && $_POST['s']==1) Yii::app()->user->setFlash('success','ok');
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
                MYMail::MailerTo($m->email,"Письмо для восстановления пароля на сайте yustk.com");
                Yii::app()->mailer->MsgHTML($this->renderPartial(Yii::app()->mailer->recoveryPassword, array('generate'=>$m->generate,'id'=>$m->id,"url"=>Yii::app()->request->baseUrl),true));
                if(Yii::app()->mailer->send()){
                    $this->echoAjaxMessage(11);
                }else{
                    $this->echoAjaxMessage(12);
                }
            }
        }

        public function actionsavenewpassword(){
            if(!$m = Clients::model()->findByPk($_POST['user'])) $this->echoAjaxMessage(2);
            $p = trim($_POST['password']);
            $m->password = md5($p);
            if( $m->save() ) echo 1;
            else echo 0;
        }

	    public function actionExit()
	    {
	        Yii::app()->user->logout();
	        $this->redirect($this->createUrl("/static"));
	    }
}