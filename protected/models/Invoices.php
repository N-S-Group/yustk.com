<?php

Yii::import('application.models._base.BaseInvoices');

class Invoices extends BaseInvoices
{
    public $invoice;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getData(){
        return Invoices::model()->findAll();
    }

    private static function rename(){//ïåğåèìåíîâàíèå çàãğóæàåìûõ ôàéëîâ
        if(strlen($_FILES['Invoices']['name']['invoice'])>0 ) $_FILES['Invoices']['name']['invoice'] = 'invoice'.preg_replace('/(^.*)(\.)/','$2',$_FILES['Invoices']['name']['invoice']);
    }

    public static function add($post,$id = false){

        $model = ($id)?Invoices::model()->findByPk( $id ):new Invoices;

        return self::formData($model,$post);
    }

    public static function formData($model,$post){
        self::rename();
        $model->num_document = trim( MYChtml::filterJSON($post['num_document']));
        $model->description =  trim(MYChtml::filterJSON($post['description']));
        $model->date = MYDate::DateInBase($post['date']);
        $model->agreement_id = $post['agreement_id'];
        if(isset($post['status'])) $model->status = $post['status'];
        $model->invoice = CUploadedFile::getInstance($model,'invoice');
        if(strlen($_FILES['Invoices']['name']['invoice'])>0) $model->filename = $_FILES['Invoices']['name']['invoice'];
        if(!$model->save()) return false;
        if($model->invoice!=NULL) return MYFiles::uploadFile('invoices/'.$model->id,$model->invoice);
        return true;
    }

    public function defaultScope()
    {
        return array(
            'condition'=>"`status`!=3"
        );
    }
}