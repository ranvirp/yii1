<?php

/**
 * This is the model class for table "skill_level".
 *
 * The followings are the available columns in table 'skill_level':
 * @property integer $id
 * @property integer $category_id
 * @property string $name_hi
 * @property string $name_en
 * @property string $unit_hi
 * @property string $unit_en
 * @property integer $level
 * @property string $subject_code
 * @property string $required_value
 *
 * The followings are the available model relations:
 * @property SkillLevelCategory $category
 * @property Subject $subjectCode
 */
class SkillLevel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'skill_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, level', 'numerical', 'integerOnly'=>true),
			array('name_hi, name_en, unit_hi, unit_en,required_value', 'length', 'max'=>45),
			array('subject_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, name_hi, name_en, unit_hi, unit_en, level, subject_code', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'SkillLevelCategory', 'category_id'),
			'subjectCode' => array(self::BELONGS_TO, 'Subject', 'subject_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'category_id' => Yii::t('app','Category'),
			'name_hi' => Yii::t('app','Name Hi'),
			'name_en' => Yii::t('app','Name En'),
			'unit_hi' => Yii::t('app','Unit Hi'),
			'unit_en' => Yii::t('app','Unit En'),
			'level' => Yii::t('app','Level'),
			'subject_code' => Yii::t('app','Subject Code'),
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('name_hi',$this->name_hi,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('unit_hi',$this->unit_hi,true);
		$criteria->compare('unit_en',$this->unit_en,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('subject_code',$this->subject_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SkillLevel the static model class
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
        public static function listAllSkilLevel($className=__CLASS__)
        {
            $x=array();
            $lang=Yii::app()->language;
            $name ="name_".$lang;
            $unit="unit_".$lang;
            $sls = $className::model()->findAll(array('order'=>'subject_code ASC,level ASC'));
            foreach ($sls as $skillLevel)
            {
               
                $subject=$skillLevel->subjectCode;
                $category=$skillLevel->category;
                $x[$subject->$name][$skillLevel->level][]=array('id'=>$skillLevel->id,'category'=>$category->$name,'name'=>$skillLevel->$name,'unit'=>$skillLevel->unit_en,'unit_lang'=>$skillLevel->$unit);
            }
            return $x; 
        }
}
