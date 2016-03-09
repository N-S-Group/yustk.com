<?php

class StaticController extends CController
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
    public function filters()
    {
        return array(
            'preLoadTree'
        );
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


                }

                $this->section = "guest-book"; $this->isMain=true; $this->render("director");

                break;

                case "guest-book":
                $this->courSection = "guest-book";
                $this->title = "������";
                $this->description = "������";
                $this->section = "guest-book"; $this->isMain=true; $this->render("guestbook");

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

    public function actionError() {
        $this->renderPartial("/error/index");
    }



}

