<?php

/**
 * This is the model class for table "works".
 *
 * The followings are the available columns in table 'works':
 * @property string $bwid
 * @property string $title
 * @property double $gpslat
 * @property double $gpslong
 * @property string $finyear
 * @property double $sanctioned_cost
 * @property string $officerincharge
 * @property string $schemecode
 */
class Works extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'works';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bwid, title', 'required'),
			array('gpslat, gpslong, sanctioned_cost', 'numerical'),
			array('bwid', 'length', 'max'=>20),
			array('title', 'length', 'max'=>1000),
			array('finyear', 'length', 'max'=>8),
			array('officerincharge, schemecode', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('bwid, title, gpslat, gpslong, finyear, sanctioned_cost, officerincharge, schemecode', 'safe', 'on'=>'search'),
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
			'bwid' => Yii::t('app','Bwid'),
			'title' => Yii::t('app','Title'),
			'gpslat' => Yii::t('app','Gpslat'),
			'gpslong' => Yii::t('app','Gpslong'),
			'finyear' => Yii::t('app','Finyear'),
			'sanctioned_cost' => Yii::t('app','Sanctioned Cost'),
			'officerincharge' => Yii::t('app','Officerincharge'),
			'schemecode' => Yii::t('app','Schemecode'),
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

		$criteria->compare('bwid',$this->bwid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('gpslat',$this->gpslat);
		$criteria->compare('gpslong',$this->gpslong);
		$criteria->compare('finyear',$this->finyear,true);
		$criteria->compare('sanctioned_cost',$this->sanctioned_cost);
		$criteria->compare('officerincharge',$this->officerincharge,true);
		$criteria->compare('schemecode',$this->schemecode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Works the static model class
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
