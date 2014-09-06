<?php

class DesignationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
		$model=new Designation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		try {
        if (isset($_POST['Designation'])) {
			$model->attributes=$_POST['Designation'];
			//$model->district_code=$_POST[]
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		}
		catch (CDbException $e)
		{
			$model->addError('designation_type_id', "The post has already been created");
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
/**
 * TODO: an update form 
 */
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $userDesignation = Designation::model()->getDesignationModelByUser(Yii::app()->user->id);
		if ($userDesignation)
		   {
			$district_code = $userDesignation->designation->district_code;
			//$district_name = $userDesignation->designation->district->$name;
		   }
		else
			$district_code = null;
		if ($district_code !=$model->district_code)
		{
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
try{
		if (isset($_POST['Designation'])) {
			$model->attributes=$_POST['Designation'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}
}
		catch (CDbException $e)
		{
			$model->addError('designation_type_id', "The post has already been created");
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
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Designation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Designation('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Designation'])) {
			$model->attributes=$_GET['Designation'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Designation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Designation::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Designation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='designation-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionGetByTypeJSON($id,$dist)
	{
		print json_encode(Designation::model()->getByType($id,$dist));
	}
	public function actionGetLevelsByTypeJSON($id,$dist)
	{
		print json_encode(Designation::model()->getLevelsByType($id,$dist));
	}
	public function actionUserAssign()
	{
		$model=new DesignationUser;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        if (isset($_POST['DesignationAssign'])) {
			$model->attributes=$_POST['DesignationAssign'];
			$model->create_time=time();
			$model->create_user=Yii::app()->user->id;
			if ($model->save()) {
				$this->redirect(array('userDesignationView','id'=>$model->id));
			}
		}

		$this->render('_formAssign',array(
			'model'=>$model,
		));
	}
}