<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property integer $school_id
 * @property integer $class
 * @property string $name_hi
 * @property string $name_en
 * @property string $date_of_birth
 * @property integer $age
 * @property string $photo
 * @property integer $rollno
 * @property string $section
 *
 * The followings are the available model relations:
 * @property LearningLevel[] $learningLevels
 * @property School $school
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_id, class, age, rollno', 'numerical', 'integerOnly'=>true),
			array('name_hi, name_en, photo', 'length', 'max'=>45),
			array('section', 'length', 'max'=>1),
			array('date_of_birth', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, school_id, class, name_hi, name_en, date_of_birth, age, photo, rollno, section', 'safe', 'on'=>'search'),
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
			'learningLevels' => array(self::HAS_MANY, 'LearningLevel', 'student_id'),
			'school' => array(self::BELONGS_TO, 'School', 'school_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'school_id' => Yii::t('app','School'),
			'class' => Yii::t('app','Class'),
			'name_hi' => Yii::t('app','Name Hi'),
			'name_en' => Yii::t('app','Name En'),
			'date_of_birth' => Yii::t('app','Date Of Birth'),
			'age' => Yii::t('app','Age'),
			'photo' => Yii::t('app','Photo'),
			'rollno' => Yii::t('app','Rollno'),
			'section' => Yii::t('app','Section'),
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
		$criteria->compare('school_id',$this->school_id);
		$criteria->compare('class',$this->class);
		$criteria->compare('name_hi',$this->name_hi,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('rollno',$this->rollno);
		$criteria->compare('section',$this->section,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
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
	/*
	 * Behavior
	 * 
	 */
	public function behaviors()
	{
		return array(
		'image' => array(
            'class' => 'ext.AttachmentBehavior.AttachmentBehavior',
            # Should be a DB field to store path/filename
            'attribute' => 'photo',
            # Default image to return if no image path is found in the DB
            //'fallback_image' => 'images/sample_image.gif',
            'path' => "uploads/:model/:id.:ext",
            'processors' => array(
                array(
                    # Currently GD Image Processor and Imagick Supported
                    'class' => 'GDProcessor',
                    'method' => 'resize',
                    'params' => array(
                        'width' => 310,
                        'height' => 150,
                        'keepratio' => true
                    )
                )
            ),
            'styles' => array(
                # name => size 
                # use ! if you would like 'keepratio' => false
                'thumb' => '!100x60',
            )           
        ),
    );
	}
}
