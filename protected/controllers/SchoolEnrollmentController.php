<?php

class SchoolEnrollmentController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
		$model=new SchoolEnrollment;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        if (isset($_POST['SchoolEnrollment']))
		{
			$errors=array();
			$models=array();
			for ($i=1;$i<=5;$i++)
			{
			   $model=new SchoolEnrollment;
			   $model->school_code=$_POST['SchoolEnrollment']['school_code'];
			   $model->class=$i;
			   $model->male=$_POST["male$i"];
			   $model->female=$_POST["female$i"];
			   $model->total=$_POST["total$i"];
			   $model->created_time=time();
			   $model->created_user=Yii::app()->user->id;
			   if ($model->total != $model->male + $model->female) 
			   {
				  $errors[$i]="Male Female students do not add up to total in class $i";
				  // $i=7;
			   }
			   $models[]=$model;
			   
			   
			}
			if (($i==6)&& (count($errors)==0))
			{
				$errcount=0;
				foreach ($models as $model1)
				{
					if (!$model1->validate(null,false)) $errcount++;
				}
				if ($errcount==0)
				{
					foreach ($models as $model1)
				{
					$model1->save();
				}
				}
				$this->redirect(array('view','school_id'=>$model->school_code));
			}

		}
	
		

		$this->render('create',array(
			'model'=>$model,
			'post' =>$_POST,
			'errors'=>$errors,
		));
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

		if (isset($_POST['SchoolEnrollment'])) {
			$model->attributes=$_POST['SchoolEnrollment'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
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
		$dataProvider=new CActiveDataProvider('SchoolEnrollment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SchoolEnrollment('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['SchoolEnrollment'])) {
			$model->attributes=$_GET['SchoolEnrollment'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SchoolEnrollment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SchoolEnrollment::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SchoolEnrollment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='school-enrollment-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}