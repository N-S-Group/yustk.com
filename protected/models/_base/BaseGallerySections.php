<?php

/**
 * This is the model base class for the table "gallery_sections".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "GallerySections".
 *
 * Columns in table "gallery_sections" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $title
 *
 */
abstract class BaseGallerySections extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'gallery_sections';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'GallerySections|GallerySections', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('id, title', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, title', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
            'Gallery'=>array(self::HAS_ONE, 'Gallery', array('section'=>'id'))
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
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}