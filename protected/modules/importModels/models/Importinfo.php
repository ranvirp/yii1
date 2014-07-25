<?php

/**
 * This is the model class for table "importinfo".
 *
 * The followings are the available columns in table 'importinfo':
 * @property integer $id
 * @property string $filename
 * @property integer $filesize
 *
 * The followings are the available model relations:
 * @property Imports[] $imports
 */
class Importinfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'importinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, filesize', 'numerical', 'integerOnly'=>true),
			array('filename', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, filename, filesize', 'safe', 'on'=>'search'),
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
			'imports' => array(self::HAS_MANY, 'Imports', 'importInfo_id'),
		);
	}
/**
 *  Behavior to upload files
 */
        public function behaviors()
        {
            return array(
		'image' => array(
			'class' => 'ext.AttachmentBehavior.AttachmentBehavior',
			# Should be a DB field to store path/filename
			'attribute' => 'filename',
			# Default image to return if no image path is found in the DB
			//'fallback_image' => 'images/sample_image.gif',
			'path' => "uploads/:model/:id.:ext",
			
			'styles' => array(
				# name => size 
				# use ! if you would like 'keepratio' => false
				'thumb' => '!100x60',
			)			
		),
	);
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'filename' => Yii::t('app','Filename'),
			'filesize' => Yii::t('app','Filesize'),
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
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('filesize',$this->filesize);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Importinfo the static model class
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
	   
        $models = $className::model()->findAll();
        $pk = $className::model()->tableSchema->primaryKey;
        // format models resulting using listData     
        $list = CHtml::listData($models, $pk, 'name');
        return $list;
	}
        /**
	* Returns all models in List of primary key,name format
	*/
	public static function listAllJson($className=__CLASS__)
	{
	   
        $models = $className::model()->findAll();
        $pk = $className::model()->tableSchema->primaryKey;
        // format models resulting using listData     
        $list = CHtml::listData($models, $pk, 'name');
        return json_encode($list);
	}
}
