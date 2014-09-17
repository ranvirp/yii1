<?php

class RepliesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Replies;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Replies']))
		{
		$model->attributes=$_POST['Replies'];
			
						if($model->save()){
			if ($model->attachments!=null){
			    $fileids = explode(",",$model->attachments);
				for ($i=1;$i<sizeof($fileids);$i++) {
				   $file = Files::model()->findByPk($fileids[$i]);
				   if ($file->uploadedby ==Yii::app()->user->id) {
					 $file->objecttype="Replies";
					 $file->objectid=$model->id;
					 $file->save();
				   } 
				 
				}
				}
				
				//$this->redirect(array('view','id'=>$model->id));
				echo CJSON::encode(array('errors'=>$model->getErrors(),'redirect'=>$this->createURL("/".$model->content_type."/view",array('id'=>$model->content_type_id))));exit;
				}	}

	if (!Yii::app()->request->isAjaxRequest) {
	
		$this->render('create',array(
			'model'=>$model,
		));
		} else {
		if (array_key_exists('content_type_id',$_GET)){
	$model->content_type_id=$_GET['content_type_id'];
	}
	if (array_key_exists('content_type',$_GET)){
	$model->content_type=$_GET['content_type'];
	}
 
		$string=$this->renderPartial('_formajax',array(
			'model'=>$model,
		),true,true);
		echo CJSON::encode(array('html'=>$string,'errors'=>$model->getErrors()));
		
		}
}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Replies']))
		{
			$model->attributes=$_POST['Replies'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Replies');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Replies('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Replies']))
			$model->attributes=$_GET['Replies'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Replies::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='replies-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
