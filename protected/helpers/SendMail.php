<?

public function SendFos(){

    if($_POST['captcha'] == Yii::app()->session['captcha_keystring']){

        $__smtp=Yii::app()->params['smtp'];

        Yii::app()->mailer->Host = $__smtp['host'];
        Yii::app()->mailer->Port = $__smtp['port'];
        Yii::app()->mailer->IsSMTP();


        Yii::app()->mailer->Subject = "��������� � �����.";
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
            $this->render("/static/addad",array("message"=>"���� ������ ���������� �������1.", "error"=>false,  "post" => $_POST));
        }else{
            $this->render("/static/addad",array("message"=>"����������� ������ ��� �������� ���������, ��������� �����.", "error"=>true, "post" => $_POST));
        }
    }else{
        $this->render("/static/addad",array("message"=>"����������� ��� ������ �� �����.", "error"=>true,  "post" => $_POST));
    }

}