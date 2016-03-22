<?php

Yii::import('application.models._base.BaseClientAgreements');

class ClientAgreements extends BaseClientAgreements
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function defaultScope()
    {
        return array(
            'condition'=>"`delete`=0"
        );
    }

}