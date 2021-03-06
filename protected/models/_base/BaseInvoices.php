<?php

/**
 * This is the model base class for the table "invoices".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Invoices".
 *
 * Columns in table "invoices" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $status
 * @property integer $agreement_id
 * @property string $date
 * @property string $description
 * @property string $filename
 * @property string $num_document
 *
 */
abstract class BaseInvoices extends GxActiveRecord{

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'invoices';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Invoices|Invoices', $n);
	}

	public static function representingColumn() {
		return 'num_document';
	}

	public function rules() {
		return array(
            array('invoice', 'file', 'on'=>'update','allowEmpty'=>true),
			array('agreement_id, num_document', 'required'),
			array('status, agreement_id', 'numerical', 'integerOnly'=>true),
			array('description, filename', 'length', 'max'=>255),
			array('num_document', 'length', 'max'=>100),
			array('date', 'safe'),
			array('status, date, description, filename', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, status, agreement_id, date, description, filename, num_document', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		return array(
            'ClientAgreements'=>array(self::HAS_ONE, 'ClientAgreements', array('id'=>'agreement_id'))
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'status' => Yii::t('app', 'Status'),
			'agreement_id' => Yii::t('app', 'Agreement'),
			'date' => Yii::t('app', 'Date'),
			'description' => Yii::t('app', 'Description'),
			'filename' => Yii::t('app', 'Filename'),
			'num_document' => Yii::t('app', 'Num Document'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('status', $this->status);
		$criteria->compare('agreement_id', $this->agreement_id);
		$criteria->compare('date', $this->date, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('filename', $this->filename, true);
		$criteria->compare('num_document', $this->num_document, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}