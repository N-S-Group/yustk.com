<?php

class CabinetController extends ControlerCPanel
{


    public $title = "ÞÑÒÊ";
    public $isMain = false;
    public $isCabinet = true;
    public $section = "";
    public $photo = "";
    public $footer;
    public $priceString = "";
    public $description = "ÞÑÒÊ";
    public $path = "http://test.yustk.com";
    public $courSection = "";
    public $courCount = 4;

  /*  public function filters()
    {
        return array(
            'preLoadTree'
        );
    }*/

    public function filterPreLoadTree($filterChain)
    {

        $filterChain->run();
        return true;
    }

    public function actionIndex()
    {
        $this->section = "docs";
        $this->render("index");
    }

    public function actionInvoices()
    {
        $this->section = "invoices";
        $this->render("invoices");
    }


    public function actionRequests()
    {
        $this->section = "requests";
        $this->render("requests");
    }

    public function actionRequests2()
    {
        $this->section = "requests2";
        $this->render("requests2");
    }


    public function actionContracts()
    {
        $this->section = "contracts";
        $this->render("contracts");
    }


    public function actionError() {
        $this->renderPartial("/error/index");
    }



}

