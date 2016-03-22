<?php

/**
 * This is the model base class for the table "orders".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Orders".
 *
 * Columns in table "orders" available as properties of the model,
 * followed by relations of table "orders" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $date
 * @property integer $agreement_id
 *
 * @property TypesOrders $type0
 */
abstract class BaseOrders extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'orders';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Orders|Orders', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, type, agreement_id', 'required'),
			array('type, agreement_id', 'numerical', 'integerOnly'=>true),
			array('date', 'safe'),
			array('date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, type, date, agreement_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'type0' => array(self::BELONGS_TO, 'TypesOrders', 'type'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'type' => null,
			'date' => Yii::t('app', 'Date'),
			'agreement_id' => Yii::t('app', 'Agreement'),
			'type0' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('type', $this->type);
		$criteria->compare('date', $this->date, true);
		$criteria->compare('agreement_id', $this->agreement_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}