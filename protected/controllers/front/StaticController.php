<?php

class StaticController extends CController
{


    public $title = "ЮСТК";
    public $isMain = false;
    public $section = "";
    public $photo = "";
    public $footer;
    public $isCabinet = false;
    public $priceString = "";
    public $description = "ЮСТК";
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
                $this->title = "О нас.";
                $this->description = "О нас.";
                $this->section = "about"; $this->isMain=true; $this->render("about");

                break;


            case "contacts":
                $this->courSection = "contacts";
                $this->title = "Контактные данные. Мебель-арт. Новороссийск";
                $this->description = "Контактные данные. Мебель-арт. Новороссийск";
                $this->section = "contacts"; $this->isMain=true; $this->render("contacts");

            break;

            case "tech":
                $this->courSection = "tech";
                $this->title = "Техника";
                $this->description = "Техника";
                $this->section = "tech"; $this->isMain=true; $this->render("tech");

            break;


            case "price":
                $this->courSection = "price";
                $this->title = "Цены";
                $this->description = "Цены";
                $this->section = "tech"; $this->isMain=true; $this->render("price");

                break;

            case "director":

                $this->courSection = "guest-book";
                $this->title = "Обращение к директору";
                $this->description = "Обращение к директору";

                if (Yii::app()->request->isPostRequest) {


                }

                $this->section = "guest-book"; $this->isMain=true; $this->render("director");

                break;

                case "guest-book":
                $this->courSection = "guest-book";
                $this->title = "Отзывы";
                $this->description = "Отзывы";
                $this->section = "guest-book"; $this->isMain=true; $this->render("guestbook");

                break;

            case "createorder":
                $this->courSection = "createorder";
                $this->title = "Как заказать услугу";
                $this->description = "Как заказать услугу";
                $this->section = "createorder"; $this->isMain=true; $this->render("createorder");

                break;

            default:
                $this->title = "ЮСТК";

                $this->description = "ЮСТК";
                $this->courSection = "index";
                $this->section = "index"; $this->isMain=true; $this->render("index");

        }

    }

    public function actionError() {
        $this->renderPartial("/error/index");
    }



}

