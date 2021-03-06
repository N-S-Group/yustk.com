<?php

/**
 * This is the model base class for the table "comments".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Comments".
 *
 * Columns in table "comments" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $message
 * @property integer $user_create
 * @property integer $confirm
 * @property integer $delete
 * @property string $date_create
 * @property string $fio
 * @property string $email
 * @property string $tel
 * @property string $answer
 *
 */
abstract class BaseComments extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'comments';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Comments|Comments', $n);
	}

	public static function representingColumn() {
		return 'message';
	}

	public function rules() {
		return array(
			array('user_create, confirm, delete', 'numerical', 'integerOnly'=>true),
			array('message, date_create, fio, email, tel, answer', 'safe'),
			array('message, user_create, confirm, delete, date_create, fio, email, tel, answer', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, message, user_create, confirm, delete, date_create, fio, email, tel, answer', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'message' => Yii::t('app', 'Message'),
			'user_create' => Yii::t('app', 'User Create'),
			'confirm' => Yii::t('app', 'Confirm'),
			'delete' => Yii::t('app', 'Delete'),
			'date_create' => Yii::t('app', 'Date Create'),
			'fio' => Yii::t('app', 'Fio'),
			'email' => Yii::t('app', 'Email'),
			'tel' => Yii::t('app', 'Tel'),
			'answer' => Yii::t('app', 'Answer'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('message', $this->message, true);
		$criteria->compare('user_create', $this->user_create);
		$criteria->compare('confirm', $this->confirm);
		$criteria->compare('delete', $this->delete);
		$criteria->compare('date_create', $this->date_create, true);
		$criteria->compare('fio', $this->fio, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('tel', $this->tel, true);
		$criteria->compare('answer', $this->answer, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}