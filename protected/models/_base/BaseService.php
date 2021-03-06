<?php

/**
 * This is the model base class for the table "service".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Service".
 *
 * Columns in table "service" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $title
 * @property string $unit
 * @property string $price
 * @property integer $pid
 * @property string $description
 * @property integer $delete
 *
 */
abstract class BaseService extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'service';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Service|Services', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('title', 'required'),
			array('pid, delete', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('unit', 'length', 'max'=>100),
			array('price', 'length', 'max'=>10),
			array('description', 'safe'),
			array('pid, description, delete', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, title, unit, price, pid, description, delete', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array('Service'=>array(self::HAS_MANY, 'Service', array('id'=>'pid'))
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'unit' => Yii::t('app', 'Unit'),
			'price' => Yii::t('app', 'Price'),
			'pid' => Yii::t('app', 'Pid'),
			'description' => Yii::t('app', 'Description'),
			'delete' => Yii::t('app', 'Delete'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('unit', $this->unit, true);
		$criteria->compare('price', $this->price, true);
		$criteria->compare('pid', $this->pid);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('delete', $this->delete);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}