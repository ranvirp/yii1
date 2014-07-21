<?php

/**
 * This is the model class for table "town".
 *
 * The followings are the available columns in table 'town':
 * @property string $code
 * @property string $type
 * @property string $district_code
 * @property string $name_en
 * @property string $name_hi
 *
 * The followings are the available model relations:
 * @property District $districtCode
 * @property Ward[] $wards
 */
class Town extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'town';
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
			array('code', 'length', 'max'=>6),
			array('type', 'length', 'max'=>14),
			array('district_code', 'length', 'max'=>5),
			array('name_en, name_hi', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('code, type, district_code, name_en, name_hi', 'safe', 'on'=>'search'),
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
			'wards' => array(self::HAS_MANY, 'Ward', 'town_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'code' => 'Code',
			'type' => 'Type',
			'district_code' => 'District Code',
			'name_en' => 'Name En',
			'name_hi' => 'Name Hi',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('district_code',$this->district_code,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_hi',$this->name_hi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Town the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
