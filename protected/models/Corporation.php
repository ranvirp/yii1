<?php

/**
 * This is the model class for table "corporation".
 *
 * The followings are the available columns in table 'corporation':
 * @property string $code
 * @property string $state_code
 * @property string $name_hi
 * @property string $name_en
 * @property string $district_code
 *
 * The followings are the available model relations:
 * @property District $districtCode
 * @property State $stateCode
 */
class Corporation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'corporation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code', 'required'),
			array('code', 'length', 'max'=>3),
			array('state_code', 'length', 'max'=>2),
			array('name_hi, name_en', 'length', 'max'=>45),
			array('district_code', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('code, state_code, name_hi, name_en, district_code', 'safe', 'on'=>'search'),
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
			'districtCode' => array(self::BELONGS_TO, 'District', 'district_code'),
			'stateCode' => array(self::BELONGS_TO, 'State', 'state_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'code' => 'Code',
			'state_code' => 'State Code',
			'name_hi' => 'Name Hi',
			'name_en' => 'Name En',
			'district_code' => 'District Code',
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

		$criteria->compare('code',$this->code,true);
		$criteria->compare('state_code',$this->state_code,true);
		$criteria->compare('name_hi',$this->name_hi,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('district_code',$this->district_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Corporation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
