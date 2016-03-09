<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $password
 * @property string $login
 * @property string $name
 * @property string $email
 * @property string $salt
 * @property string $for_cookie
 */
class User extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
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
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.//for_cookie
        return array(
            array('password, login, name, email, salt, tel', 'required'),
            array('password', 'length', 'max'=>256),
            array('login', 'length', 'max'=>128), //, for_cookie
            array('name, email', 'length', 'max'=>255),
            array('salt', 'length', 'max'=>10),
            array('date_create', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, password, login, name, email, salt', 'safe', 'on'=>'search'), //, for_cookie
        );
    }

    public function  createPassword($pass, $salt) {

     return  md5($salt.$pass);
    }

    public  function generateSalt($arg) {

        $salt = "";
        for($i=0; $i<$arg; $i++) {
            $salt .= chr(rand(0, 255));

        }
        return $salt;
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('AuthAssignment'=>array(self::HAS_ONE, 'AuthAssignment', array('userid'=>'id')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'password' => 'Password',
            'login' => 'Login',
            'name' => 'Name',
            'email' => 'Email',
            'salt' => 'Salt',
            //'for_cookie' => 'For Cookie',
            'date_create' => 'date_create',

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

        $criteria->compare('id',$this->id);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('login',$this->login,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('salt',$this->salt,true);
        //$criteria->compare('for_cookie',$this->for_cookie,true);
        $criteria->compare('date_create',$this->date_create,true);
        $criteria->compare('tel',$this->tel,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    public function validatePassword($password)
    {
        return $this->hashPassword($password,$this->salt)===$this->password;
    }

    public function hashPassword($password,$salt) {

        return  md5($salt.$password);
    }


}