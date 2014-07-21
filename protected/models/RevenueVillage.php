<?php

/**
 * This is the model class for table "revenue_village".
 *
 * The followings are the available columns in table 'revenue_village':
 * @property string $code
 * @property string $tehsil_code
 * @property string $name_en
 * @property string $name_hi
 * @property string $panchayat_code
 * @property string $census_code
 *
 * The followings are the available model relations:
 * @property CitizenRural[] $citizenRurals
 * @property Panchayat $panchayatCode
 * @property Tehsil $tehsilCode
 * @property School[] $schools
 */
class RevenueVillage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'revenue_village';
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
			array('code', 'length', 'max'=>15),
			array('tehsil_code', 'length', 'max'=>6),
			array('name_en, name_hi, census_code', 'length', 'max'=>45),
			array('panchayat_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('code, tehsil_code, name_en, name_hi, panchayat_code, census_code', 'safe', 'on'=>'search'),
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
			'citizenRurals' => array(self::HAS_MANY, 'CitizenRural', 'revenue_village_code'),
			'panchayatCode' => array(self::BELONGS_TO, 'Panchayat', 'panchayat_code'),
			'tehsilCode' => array(self::BELONGS_TO, 'Tehsil', 'tehsil_code'),
			'schools' => array(self::HAS_MANY, 'School', 'revenue_viilage_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'code' => Yii::t('app','Code'),
			'tehsil_code' => Yii::t('app','Tehsil Code'),
			'name_en' => Yii::t('app','Name En'),
			'name_hi' => Yii::t('app','Name Hi'),
			'panchayat_code' => Yii::t('app','Panchayat Code'),
			'census_code' => Yii::t('app','Census Code'),
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
		$criteria->compare('tehsil_code',$this->tehsil_code,true);
		$criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('name_hi',$this->name_hi,true);
		$criteria->compare('panchayat_code',$this->panchayat_code,true);
		$criteria->compare('census_code',$this->census_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RevenueVillage the static model class
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
