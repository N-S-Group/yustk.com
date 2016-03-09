<?php

Yii::import('application.models._base.BaseRoles');

class Roles extends BaseRoles
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}