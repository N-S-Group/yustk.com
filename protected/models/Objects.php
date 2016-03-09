<?php

/**
 * This is the model class for table "objects".
 *
 * The followings are the available columns in table 'objects':
 * @property integer $cid
 * @property string $date_create
 * @property string $title
 * @property string $description
 * @property integer $is_photo
 * @property string $shot_description
 */
class Objects extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Objects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'objects';
	}

    public function limit($limit=5)
    {
        $this->getDbCriteria()->mergeWith(array(

            'limit'=>$limit,
        ));
        return $this;
    }

    public function order($arg="")
    {
        $this->getDbCriteria()->mergeWith(array(
            'order'=>$arg

        ));
        return $this;
    }


    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('is_photo', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('shot_description', 'length', 'max'=>190),
			array('date_create, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, date_create, title, description, is_photo, shot_description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'Cid',
			'date_create' => 'Date Create',
			'title' => 'Title',
			'description' => 'Description',
			'is_photo' => 'Is Photo',
			'shot_description' => 'Shot Description',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cid',$this->cid);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('is_photo',$this->is_photo);
		$criteria->compare('shot_description',$this->shot_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}