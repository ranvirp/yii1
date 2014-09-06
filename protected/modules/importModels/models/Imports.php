<?php

/**
 * This is the model class for table "imports".
 *
 * The followings are the available columns in table 'imports':
 * @property integer $id
 * @property string $import_code
 * @property string $model_name
 * @property string $model_data
 * @property string $validated
 * @property string $imported
 */
class Imports extends CActiveRecord {

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'imports';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id', 'numerical', 'integerOnly' => true),
			array('import_code, model_name, model_data, validated, imported', 'length', 'max' => 45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, import_code, model_name, model_data, validated, imported', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'import_code' => Yii::t('app', 'Import Code'),
			'model_name' => Yii::t('app', 'Model Name'),
			'model_data' => Yii::t('app', 'Model Data'),
			'validated' => Yii::t('app', 'Validated'),
			'imported' => Yii::t('app', 'Imported'),
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
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('import_code', $this->import_code, true);
		$criteria->compare('model_name', $this->model_name, true);
		$criteria->compare('model_data', $this->model_data, true);
		$criteria->compare('validated', $this->validated, true);
		$criteria->compare('imported', $this->imported, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Imports the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * Returns all models in List of primary key,name format
	 */
	public static function listAll($className = __CLASS__) {
		$lang = Yii::app()->language;
		$models = $className::model()->findAll();
		$pk = $className::model()->tableSchema->primaryKey;
		// format models resulting using listData     
		$list = CHtml::listData($models, $pk, 'name_' . $lang);
		return $list;
	}

	/**
	 * Returns all models in List of primary key,name format
	 */
	public static function listAllJson($className = __CLASS__) {
		$lang = Yii::app()->language;
		$models = $className::model()->findAll();
		$pk = $className::model()->tableSchema->primaryKey;
		// format models resulting using listData     
		$list = CHtml::listData($models, $pk, 'name_' . $lang);
		return json_encode($list);
	}

	/*
	 *  We need to first generate a form to upload xlsx files and also get values of foreign keys 
	 *  as drop down...we shall first look for a form in model/_import.php otherwise we shall use 
	 *  our own form.
	 *  Form shall have a correlation table for fields and columns of xlsx file
	 *  There shall also be facility to upload new file or select existing files
	 *  from uploads 
	 * --strategy
	 * connect to the datasource and get the fields per row 
	 */
    
}
