<?php

/**
 * This is the model class for table "importinfo".
 *
 * The followings are the available columns in table 'importinfo':
 * @property integer $id
 * @property string $filename
 * @property integer $filesize
 * @property string $correlation
 * @property varchar $modelName
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
			
			//array(' filesize', 'numerical', 'integerOnly'=>true),
		//	array('filename', 'unsafe'),
			array('modelName', 'safe'),
			//array('correlation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			
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
			'modelName'=>Yii::t('app','modelName'),
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
	public static function createCorrelationArray($xlsxfile, $model) {
		// get a reference to the path of PHPExcel classes 
		$phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');

		// Turn off our amazing library autoload 
		spl_autoload_unregister(array('YiiBase', 'autoload'));
		include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
		$inputFileType = PHPExcel_IOFactory::identify($xlsxfile);

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);

		$objReader->setReadDataOnly(true);

		/**  Load $inputFileName to a PHPExcel Object  * */
		$objPHPExcel = $objReader->load($xlsxfile);

		//$total_sheets = $objPHPExcel->getSheetCount();

		//$allSheetName = $objPHPExcel->getSheetNames();
		//$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
		//$highestRow = $objWorksheet->getHighestRow();
		$highestColumn = $objWorksheet->getHighestColumn();
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		//for ($row = 1; $row <= $highestRow; ++$row) {
			for ($col = 0; $col < $highestColumnIndex; ++$col) {
				$value = $objWorksheet->getCellByColumnAndRow($col, 1)->getValue();

				$arraydata[] = $value;
			}
		//}
			spl_autoload_register(array('YiiBase', 'autoload'));
		return $arraydata;
	}
	public static function fetchDataFromSource($xlsxfile, $model) {
		// get a reference to the path of PHPExcel classes 
		$phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');

		// Turn off our amazing library autoload 
		spl_autoload_unregister(array('YiiBase', 'autoload'));
		include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
		$inputFileType = PHPExcel_IOFactory::identify($xlsxfile);

		$objReader = PHPExcel_IOFactory::createReader($inputFileType);

		$objReader->setReadDataOnly(true);

		/**  Load $inputFileName to a PHPExcel Object  * */
		$objPHPExcel = $objReader->load($xlsxfile);

		$total_sheets = $objPHPExcel->getSheetCount();

		$allSheetName = $objPHPExcel->getSheetNames();
		$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
		$highestRow = $objWorksheet->getHighestRow();
		$highestColumn = $objWorksheet->getHighestColumn();
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		for ($row = 1; $row <= $highestRow; ++$row) {
			for ($col = 0; $col < $highestColumnIndex; ++$col) {
				$value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();

				$arraydata[$row - 1][$col] = $value;
			}
		}
		print_r($arraydata);
		spl_autoload_register(array('YiiBase', 'autoload'));
	}

}
