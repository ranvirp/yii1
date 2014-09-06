<?php

/**
 * This is the model class for table "school_enrollment".
 *
 * The followings are the available columns in table 'school_enrollment':
 * @property integer $id
 * @property string $school_code
 * @property integer $class
 * @property integer $male
 * @property integer $female
 * @property integer $total
 * @property integer $created_time
 * @property integer $created_user
 */
class SchoolEnrollment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'school_enrollment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_code, class, male, female, total, created_time, created_user', 'required'),
			array('class, male, female, total, created_time, created_user', 'numerical', 'integerOnly'=>true),
			array('school_code', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, school_code, class, male, female, total, created_time, created_user', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app','ID'),
			'school_code' => Yii::t('app','School Code'),
			'class' => Yii::t('app','Class'),
			'male' => Yii::t('app','Male'),
			'female' => Yii::t('app','Female'),
			'total' => Yii::t('app','Total'),
			'created_time' => Yii::t('app','Created Time'),
			'created_user' => Yii::t('app','Created User'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('school_code',$this->school_code,true);
		$criteria->compare('class',$this->class);
		$criteria->compare('male',$this->male);
		$criteria->compare('female',$this->female);
		$criteria->compare('total',$this->total);
		$criteria->compare('created_time',$this->created_time);
		$criteria->compare('created_user',$this->created_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SchoolEnrollment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	* Returns all models in List of primary key,name format
	*/
	public static function listAll($className=__CLASS__)
	{
	    $lang = Yii::app()->language;
        $models = $className::model()->findAll();
        $pk = $className::model()->tableSchema->primaryKey;
        // format models resulting using listData     
        $list = CHtml::listData($models, $pk, 'name_'.$lang);
        return $list;
	}
        /**
	* Returns all models in List of primary key,name format
	*/
	public static function listAllJson($className=__CLASS__)
	{
	    $lang = Yii::app()->language;
        $models = $className::model()->findAll();
        $pk = $className::model()->tableSchema->primaryKey;
        // format models resulting using listData     
        $list = CHtml::listData($models, $pk, 'name_'.$lang);
        return json_encode($list);
	}
}
