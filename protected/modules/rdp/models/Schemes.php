<?php

/**
 * This is the model class for table "{{schemes}}".
 *
 * The followings are the available columns in table '{{schemes}}':
 * @property integer $id
 * @property integer $parentid
 * @property string $name
 * @property integer $depid
 * @property string $code
 * @property integer $admin
 */
class Schemes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Schemes the static model class
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
		return '{{schemes}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' name, depid, code', 'required'),
			array('parentid, depid, admin', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(' parentid, name, depid, code, admin', 'safe', 'on'=>'search'),
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
		'department'=>array(self::BELONGS_TO,'Department','depid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parentid' => 'Parentid',
			'name' => 'Name',
			'depid' => 'Depid',
			'code' => 'Code',
			'admin' => 'Admin',
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
		$criteria->compare('parentid',$this->parentid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('department',$this->department);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('admin',$this->admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function listAllAsOptions()
	{
		$str="";
		$models = Schemes::model()->findAll();
		foreach ($models as $model)
		{
			$str.="<option value='".$model->id."'>".$model->name."</option>\n";
		}
		return $str;
	}
	public static function listAllAsArray($modelName)
	{
		$str=array();
		$models = $modelName::model()->findAll();
		foreach ($models as $model)
		{
			$str[$model->id]=$model->name;
		}
		return $str;
	}
}