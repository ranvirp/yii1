<?php

/**
 * This is the model class for table "designation".
 *
 * The followings are the available columns in table 'designation':
 * @property integer $id
 * @property string $level
 * @property string $level_id
 * @property string $userid
 * @property integer $designation_type_id
 *
 * The followings are the available model relations:
 * @property DesignationType $designationType
 */
class Designation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'designation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, designation_type_id', 'required'),
			array('id, designation_type_id', 'numerical', 'integerOnly'=>true),
			array('level, level_id, userid', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, level, level_id, userid, designation_type_id', 'safe', 'on'=>'search'),
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
			'designationType' => array(self::BELONGS_TO, 'DesignationType', 'designation_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'level' => 'Level',
			'level_id' => 'Level',
			'userid' => 'Userid',
			'designation_type_id' => 'Designation Type',
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
		$criteria->compare('level',$this->level,true);
		$criteria->compare('level_id',$this->level_id,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('designation_type_id',$this->designation_type_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Designation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
