<?php

/**
 * This is the model class for table "{{milestones}}".
 *
 * The followings are the available columns in table '{{milestones}}':
 * @property integer $id
 * @property integer $schemeid
 * @property string $title
 * @property integer $desc
 * @property integer $dofmst
 */
class Milestones extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Milestones the static model class
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
		return '{{milestones}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, schemeid, title, desc, dofmst', 'required'),
			array('id, schemeid, desc, dofmst', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, schemeid, title, desc, dofmst', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'schemeid' => 'Schemeid',
			'title' => 'Title',
			'desc' => 'Desc',
			'dofmst' => 'Dofmst',
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
		$criteria->compare('schemeid',$this->schemeid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc);
		$criteria->compare('dofmst',$this->dofmst);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}