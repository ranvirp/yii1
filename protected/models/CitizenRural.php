<?php

/**
 * This is the model class for table "citizen_rural".
 *
 * The followings are the available columns in table 'citizen_rural':
 * @property integer $id
 * @property string $name_en
 * @property string $name_hi
 * @property string $father_name_en
 * @property string $spouse_name_en
 * @property string $father_name_hi
 * @property string $spouse_name_hi
 * @property string $revenue_village_code
 * @property string $address
 * @property string $mobile1
 * @property string $mobile2
 * @property string $photo
 * @property string $gender
 *
 * The followings are the available model relations:
 * @property RevenueVillage $revenueVillageCode
 */
class CitizenRural extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'citizen_rural';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, address,  gender', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('name_en, name_hi, father_name_en, spouse_name_en, father_name_hi, spouse_name_hi', 'length', 'max'=>45),
			array('revenue_village_code', 'length', 'max'=>10),
			array('mobile1, mobile2', 'length', 'max'=>12),
                    array('address', 'length', 'max'=>250),
			array('gender', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(' name_en, name_hi, father_name_en, spouse_name_en, father_name_hi, spouse_name_hi, revenue_village_code, address, mobile1, mobile2, photo, gender', 'safe', 'on'=>'search'),
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
			'revenueVillageCode' => array(self::BELONGS_TO, 'RevenueVillage', 'revenue_village_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name_en' => Yii::t('app','Name En'),
			'name_hi' => Yii::t('app','Name Hi'),
			'father_name_en' => Yii::t('app','Father Name En'),
			'spouse_name_en' => Yii::t('app','Spouse Name En'),
			'father_name_hi' => Yii::t('app','Father Name Hi'),
			'spouse_name_hi' => Yii::t('app','Spouse Name Hi'),
			'revenue_village_code' => Yii::t('app','Revenue Village Code'),
			'address' => Yii::t('app','Address'),
			'mobile1' => Yii::t('app','Mobile1'),
			'mobile2' => Yii::t('app','Mobile2'),
			'photo' => Yii::t('app','Photo'),
			'gender' => Yii::t('app','Gender'),
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
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_hi',$this->name_hi,true);
		$criteria->compare('father_name_en',$this->father_name_en,true);
		$criteria->compare('spouse_name_en',$this->spouse_name_en,true);
		$criteria->compare('father_name_hi',$this->father_name_hi,true);
		$criteria->compare('spouse_name_hi',$this->spouse_name_hi,true);
		$criteria->compare('revenue_village_code',$this->revenue_village_code,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('mobile1',$this->mobile1,true);
		$criteria->compare('mobile2',$this->mobile2,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('gender',$this->gender,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CitizenRural the static model class
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
