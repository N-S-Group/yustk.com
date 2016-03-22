<?php

class StaticController extends Controller
{


    public $title = "����";
    public $isMain = false;
    public $section = "";
    public $photo = "";
    public $footer;
    public $isCabinet = false;
    public $priceString = "";
    public $description = "����";
    public $path = "http://localhost/yustk.com";
    public $courSection = "";
    public $courCount = 4;

    protected  function createData($data){
        $time = strtotime($data);
        return "<span>".date("d",$time)."</span><br>".MYDate::shortMonth(date("m",$time));
    }

    public function filterPreLoadTree($filterChain)
    {
        $filterChain->run();
        return true;
    }

    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
            ),
        );
    }

    public function actionIndex()
    {
        $this->section = $_GET['title'];
        switch($_GET['title']) {



            case "about":
                $this->courSection = "about";
                $this->title = "� ���.";
                $this->description = "� ���.";
                $this->section = "about"; $this->isMain=true; $this->render("about");

                break;


            case "contacts":
                $this->courSection = "contacts";
                $this->title = "���������� ������. ������-���. ������������";
                $this->description = "���������� ������. ������-���. ������������";
                $this->section = "contacts"; $this->isMain=true; $this->render("contacts");

            break;

            case "tech":
                $this->courSection = "tech";
                $this->title = "�������";
                $this->description = "�������";
                $this->section = "tech"; $this->isMain=true; $this->render("tech");

            break;


            case "price":
                $this->courSection = "price";
                $this->title = "����";
                $this->description = "����";
                $this->section = "tech"; $this->isMain=true; $this->render("price");

                break;

            case "director":


                $this->courSection = "guest-book";
                $this->title = "��������� � ���������";
                $this->description = "��������� � ���������";
                    if (Yii::app()->request->isPostRequest) {
                        $this->sendMail();
                    }

                $this->section = "guest-book"; $this->isMain=true; $this->render("director");

                break;

                case "guest-book":

                    if (Yii::app()->request->isPostRequest){
                        $this->sendCommentToBD();
                    }

                    $comments = Comments::model()->findAll(array("condition"=>"confirm = 1","order"=>"id desc", "limit"=>20));
                    if (!$comments) $comments = Array();

                $this->courSection = "guest-book";
                $this->title = "������";
                $this->description = "������";
                $this->section = "guest-book"; $this->isMain=true; $this->render("guestbook", array("comments"=>$comments));

                break;

            case "createorder":
                $this->courSection = "createorder";
                $this->title = "��� �������� ������";
                $this->description = "��� �������� ������";
                $this->section = "createorder"; $this->isMain=true; $this->render("createorder");

                break;

            default:
                $this->title = "����";
                $this->description = "����";
                $this->courSection = "index";
                $this->section = "index"; $this->isMain=true; $this->render("index");

        }

    }

   /* public function actionError() {
        $this->renderPartial("/error/index");
    }*/


    private function toArray($secret,$response)
    {
        $params = array('secret' => $secret, 'response' => $response);

        return $params;
    }

    private  function  checkReCaptcha($post)
    {
        if(isset($post['g-recaptcha-response'])){
            $captcha = $post['g-recaptcha-response'];
        }
        if(!$captcha) return false;

        $secretKey = "6LdCWRoTAAAAAEPizgC2ZzZNdqllbdiei8gml9go";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        return (intval($responseKeys["success"]) !== 1) ?false:true;

      /* $peer_key = version_compare(PHP_VERSION, '5.6.0', '<') ? 'CN_name' : 'peer_name';
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query(array('secret' => "6LdCWRoTAAAAAEPizgC2ZzZNdqllbdiei8gml9go", 'response' => $_POST["g-recaptcha-response"]), '', '&'),
                // Force the peer to validate (not needed in 5.6.0+, but still works
                'verify_peer' => true,
                // Force the peer validation to use www.google.com
                $peer_key => 'www.google.com',
            ),
        );
        $context = stream_context_create($options);

        $p = file_get_contents("https://www.google.com/recaptcha/api/siteverify", false);
        $object = json_decode($p,true);
        echo $object->success;*/

        }

    public function actiongetGenerate(){
        $id = false;
        $l = false;
        if(isset($_GET['uid']) && isset($_GET['g'])){
            if($m = Clients::getGenerate($_GET['uid'],$_GET['g'])){
                $id = $m->id;
                $l = $m->login;
            }
        }
        $this->render("recovery",array("id"=>$id,'l'=>$l));
    }

    private function sendCommentToBD(){
        $comment = new Comments();
        $comment->attributes = $_POST["comment"];
        $comment->date_create = new CDbExpression("NOW()");
        if ($comment->save()) {

            echo "<script>alert('��� ����� ����� ����������� ����� �������� �������������� �����.')</script>";

        } else {

            echo "<script>alert('��������� ������, ����� �� ����� �����������.')</script>";
        }
    }

    public function sendMail(){
      if ($this->checkReCaptcha($_POST)){
          MYMail::MailerTo(Yii::app()->params['settings']['mailMain'],"��������� � ��������� � ����� yustk.com");
          Yii::app()->mailer->CharSet = "windows-1251";
          Yii::app()->mailer->MsgHTML($this->renderPartial(Yii::app()->mailer->pathViews, array('post'=>$_POST["mail"]),true));
          if(Yii::app()->mailer->send()){
              echo "<script>alert('���� ��������� ���������� ��������� ��� ����.')</script>";
          }else{
              echo "<script>alert('����������� ������ ��� �������� ���������, ��������� �����.')</script>";
          }
        }
    }


}

