<?php
class MYMail{


            public function MailerTo($email,$subject){

                $__smtp=Yii::app()->params['smtp'];
                Yii::app()->mailer->Host = $__smtp['host'];
                Yii::app()->mailer->Port = $__smtp['port'];
                Yii::app()->mailer->IsSMTP();

                Yii::app()->mailer->Subject = $subject;//"Обращение к директору с сайта yustk.com";
                Yii::app()->mailer->SMTPAuth = $__smtp['auth'];
                Yii::app()->mailer->Username = $__smtp['username'];
                Yii::app()->mailer->Password = $__smtp['password'];
                Yii::app()->mailer->SMTPDebug = $__smtp['debug'];
                Yii::app()->mailer->From = $__smtp['from'];
                Yii::app()->mailer->FromName = $__smtp['fromname'];
                Yii::app()->mailer->AddAddress($email); //bablgum@mail.ru
                Yii::app()->mailer->CharSet = "windows-1251";
            }
}
?>