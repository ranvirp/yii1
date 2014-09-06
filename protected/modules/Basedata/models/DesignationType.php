<?php

/**
 * This is the model class for table "designation_type".
 *
 * The followings are the available columns in table 'designation_type':
 * @property integer $id
 * @property string $name_hi
 * @property string $code
 * @property integer $department_id
 * @property string $name_en
 * @property integer $level_id
 *
 * The followings are the available model relations:
 * @property Designation[] $designations
 * @property Department $department
 * @property Level $level
 */
class DesignationType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'designation_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_hi, code, department_id, level_id', 'required'),
			array('department_id, level_id', 'numerical', 'integerOnly'=>true),
			array('name_hi, name_en', 'length', 'max'=>45),
			array('code', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name_hi, code, department_id, name_en, level_id', 'safe', 'on'=>'search'),
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
			'designations' => array(self::HAS_MANY, 'Designation', 'designation_type_id'),
			'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name_hi' => Yii::t('app','Name Hi'),
			'code' => Yii::t('app','Code'),
			'department_id' => Yii::t('app','Department'),
			'name_en' => Yii::t('app','Name En'),
			'level_id' => Yii::t('app','Level'),
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
		$criteria->compare('name_hi',$this->name_hi,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('level_id',$this->level_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DesignationType the static model class
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
