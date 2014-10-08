<?php

/**
 * This is the model class for table "landdisputes".
 *
 * The followings are the available columns in table 'landdisputes':
 * @property integer $id
 * @property string $complainants
 * @property string $oppositions
 * @property integer $revenuevillage
 * @property integer $policestation
 * @property string $gatanos
 * @property integer $category
 * @property string $description
 * @property integer $courtcasepending
 * @property string $courtcasedetails
 * @property integer $policerequired
 * @property string $nextdateofaction
 * @property integer $disputependingfor
 * @property integer $casteorcommunal
 */
class Landdisputes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'landdisputes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('complainants, oppositions, revenuevillage, policestation, gatanos, category, description, courtcasepending, policerequired, nextdateofaction, disputependingfor, casteorcommunal', 'required'),
			array('revenuevillage, policestation, category, courtcasepending, policerequired, disputependingfor, casteorcommunal', 'numerical', 'integerOnly'=>true),
			array('complainants, oppositions', 'length', 'max'=>100),
			array('gatanos', 'length', 'max'=>220),
			array('courtcasedetails', 'length', 'max'=>1000),
			array('nextdateofaction', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, complainants, oppositions, revenuevillage, policestation, gatanos, category, description, courtcasepending, courtcasedetails, policerequired, nextdateofaction, disputependingfor, casteorcommunal', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app','ID'),
			'complainants' => Yii::t('app','Complainants'),
			'oppositions' => Yii::t('app','Oppositions'),
			'revenuevillage' => Yii::t('app','Revenuevillage'),
			'policestation' => Yii::t('app','Policestation'),
			'gatanos' => Yii::t('app','Gatanos'),
			'category' => Yii::t('app','Category'),
			'description' => Yii::t('app','Description'),
			'courtcasepending' => Yii::t('app','Courtcasepending'),
			'courtcasedetails' => Yii::t('app','Courtcasedetails'),
			'policerequired' => Yii::t('app','Policerequired'),
			'nextdateofaction' => Yii::t('app','Nextdateofaction'),
			'disputependingfor' => Yii::t('app','Disputependingfor'),
			'casteorcommunal' => Yii::t('app','Casteorcommunal'),
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
		$criteria->compare('complainants',$this->complainants,true);
		$criteria->compare('oppositions',$this->oppositions,true);
		$criteria->compare('revenuevillage',$this->revenuevillage);
		$criteria->compare('policestation',$this->policestation);
		$criteria->compare('gatanos',$this->gatanos,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('courtcasepending',$this->courtcasepending);
		$criteria->compare('courtcasedetails',$this->courtcasedetails,true);
		$criteria->compare('policerequired',$this->policerequired);
		$criteria->compare('nextdateofaction',$this->nextdateofaction,true);
		$criteria->compare('disputependingfor',$this->disputependingfor);
		$criteria->compare('casteorcommunal',$this->casteorcommunal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Landdisputes the static model class
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
