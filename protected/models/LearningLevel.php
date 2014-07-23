<?php

/**
 * This is the model class for table "learning_level".
 *
 * The followings are the available columns in table 'learning_level':
 * @property integer $id
 * @property string $value
 * @property integer $student_id
 * @property integer $skill_level_id
 * @property integer $month
 * @property integer $year
 * @property string $creation_user
 * @property string $creation_time
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property SkillLevel $skillLevel
 */
class LearningLevel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'learning_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, skill_level_id', 'required'),
			array('student_id, skill_level_id, month, year', 'numerical', 'integerOnly'=>true),
			array('value, creation_user, creation_time', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, value, student_id, skill_level_id, month, year, creation_user, creation_time', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'skillLevel' => array(self::BELONGS_TO, 'SkillLevel', 'skill_level_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'value' => Yii::t('app','Value'),
			'student_id' => Yii::t('app','Student'),
			'skill_level_id' => Yii::t('app','Skill Level'),
			'month' => Yii::t('app','Month'),
			'year' => Yii::t('app','Year'),
			'creation_user' => Yii::t('app','Creation User'),
			'creation_time' => Yii::t('app','Creation Time'),
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
		$criteria->compare('value',$this->value,true);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('skill_level_id',$this->skill_level_id);
		$criteria->compare('month',$this->month);
		$criteria->compare('year',$this->year);
		$criteria->compare('creation_user',$this->creation_user,true);
		$criteria->compare('creation_time',$this->creation_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LearningLevel the static model class
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
         * Returns  Learning Level of Student by Month,Year Subject Wise
         * 
         */
       public static function getLearningLevelByMonth($student_id,$month,$year)
        {
            $lls = LearningLevel::model()->with('skillLevel')->findAllByAttributes(array('student_id'=>$student_id,'month'=>$month,'year'=>$year));
            return LearningLevel::arrayOfLL($lls);
        }
        private static function arrayOfLL($lls)
        {
           $x=array();
            $lang=Yii::app()->language;
            $name ="name_".$lang;
             $unit ="unit_".$lang;
            foreach ($lls as $ll)
            {
                $skillLevel=$ll->skillLevel;
                $subject=$skillLevel->subjectCode;
                $category=$skillLevel->category;
                $id=$skillLevel->id;
                $x[$subject->$name][$skillLevel->level][]=array('id'=>$id,'category'=>$category->$name,'name'=>$skillLevel->$name,'value'=>$ll->value,'unit'=>$skillLevel->unit_en,'unit_lang'=>$skillLevel->$unit);
            }
            foreach ($x as $subj=>$y)
            {
                ksort($y);
            }
            return $x; 
        }
        
        
}
