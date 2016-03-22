<?php

class RequestController extends ControlerCPanel
{


    public $title = "ŞÑÒÊ";
    public $isMain = false;
    public $isCabinet = true;
    public $section = "";
    public $photo = "";
    public $footer;
    public $priceString = "";
    public $description = "ŞÑÒÊ";
    public $path = "http://localhost/yustk.com";
    public $courSection = "";
    public $courCount = 4;

    public function filterPreLoadTree($filterChain)
    {

        $filterChain->run();
        return true;
    }

    public function actionSaveOrder()
    {
        if($model = Orders::add($_POST)){
            if($model->type == 2) $this->createPdf($model);
            MYMail::MailerTo(Yii::app()->params['settings']['mailMain'],$model->name." (¹".$model->id.")");
            Yii::app()->mailer->MsgHTML($this->renderPartial(Yii::app()->mailer->request_act, array('model'=>$model),true));
            echo (Yii::app()->mailer->send())?1:1;
        }else echo 0;
    }

    public function actionshowTable(){
        $this->renderPartial('table',array("d"=>$_POST['d'],'request'=>$_POST['request']));
    }


    public function createPdf($model){
        $user = Clients::model()->findByPk( Yii::app()->user->getId() );
        $str = MYPdf::getPdfString($model,$user);
        $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf',
            'P', 'cm', 'A4', true, 'UTF-8');
        $pdf->SetCreator(PDF_CREATOR);

        $pdf->SetAuthor("");
        $pdf->SetTitle("Çàÿâêà íà ğåéñ áóíêåğîâîçà");
        $pdf->SetSubject("Çàÿâêà íà ğåéñ áóíêåğîâîçà");
        $pdf->SetKeywords("Çàÿâêà íà ğåéñ áóíêåğîâîçà");
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->SetFont("freeserif", "", 10);
        $pdf->writeHTML($str, true, false, false, false, '');
        if(!is_dir(getcwd()."/uploads/orders/".$model->id)) mkdir( getcwd()."/uploads/orders/".$model->id ,0770);
        //    $pdf->Output("order.pdf", "I");
        $pdf->Output(getcwd()."/uploads/orders/".$model->id."/Order.pdf", "F");
       // return $model->id;
    }
}
