<?php

/**
 * This is the model class for table "uploads".
 *
 * The followings are the available columns in table 'uploads':
 * @property string $code
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $location
 * @property string $created_user
 * @property string $created_time
 * @property string $view_rights
 * @property string $delete_rights
 * @property string $update_rights
 * @property string $mime_type
 * @property string $size
 */
class Uploads extends CActiveRecord
{
	public $file;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uploads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, title, description', 'required'),
			array('code', 'length', 'max'=>40),
			array('name, location, created_user, created_time, view_rights, delete_rights, update_rights, mime_type, size', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('code, name, title, description, location, created_user, created_time, view_rights, delete_rights, update_rights, mime_type, size', 'safe', 'on'=>'search'),
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
			'code' => Yii::t('app','Code'),
			'name' => Yii::t('app','Name'),
			'title' => Yii::t('app','Title'),
			'description' => Yii::t('app','Description'),
			'location' => Yii::t('app','Location'),
			'created_user' => Yii::t('app','Created User'),
			'created_time' => Yii::t('app','Created Time'),
			'view_rights' => Yii::t('app','View Rights'),
			'delete_rights' => Yii::t('app','Delete Rights'),
			'update_rights' => Yii::t('app','Update Rights'),
			'mime_type' => Yii::t('app','Mime Type'),
			'size' => Yii::t('app','Size'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('view_rights',$this->view_rights,true);
		$criteria->compare('delete_rights',$this->delete_rights,true);
		$criteria->compare('update_rights',$this->update_rights,true);
		$criteria->compare('mime_type',$this->mime_type,true);
		$criteria->compare('size',$this->size,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Uploads the static model class
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
