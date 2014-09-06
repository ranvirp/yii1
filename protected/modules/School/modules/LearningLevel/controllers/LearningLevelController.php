<?php

class LearningLevelController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//School/layouts/main';

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
				'actions'=>array('create','update','getForm','getStudentProfile'),
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
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['LearningLevel'])) {
                    $month=$_POST['LearningLevel']['month'];
                    $year=$_POST['LearningLevel']['year'];
                    $student_id=$_POST['LearningLevel']['student_id'];
                    foreach ($_POST['value'] as $skillLevelId=>$value)
                    {
                        $x=LearningLevel::model()->findByAttributes(array('month'=>$month,'year'=>$year,'student_id'=>$student_id,'skill_level_id'=>$skillLevelId));
                       
                        if ($x!=null)
                            $model=$x;
                                else 
                            $model=new LearningLevel;
                        $model->student_id=$student_id;
                        $model->month=$month;
                        $model->year=$year;
                        $model->skill_level_id=$skillLevelId;
                        $model->value=$value;
                        $model->creation_time=  time();
                        $model->creation_user=Yii::app()->user->id;
                        $model->save();
                    }
                    
			
				$this->render('gridViewLearningLevel',array('arrayOfLL'=>  LearningLevel::getLearningLevelByMonth($student_id, $month, $year)));
                                return;
			
                
                     
		}
$model=new LearningLevel;
		$this->render('create',array(
			'model'=>$model,
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

		if (isset($_POST['LearningLevel'])) {
			$model->attributes=$_POST['LearningLevel'];
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
		$dataProvider=new CActiveDataProvider('LearningLevel');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LearningLevel('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['LearningLevel'])) {
			$model->attributes=$_GET['LearningLevel'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LearningLevel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LearningLevel::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LearningLevel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='learning-level-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /*
         * Returns Learning Level Chart for each month
         */
        public function actionGetForm($s,$m)
        {
            $y=date('Y');
            $lls=LearningLevel::model()->getLearningLevelByMonth($s,$m,$y);
            print $this->renderPartial('gridViewLearningLevelForm',array('arrayOfLL'=>$lls));
        }
        public function actionGetStudentProfile($s,$m,$y)
        {
            $arrayOfLL=LearningLevel::getLearningLevelByMonth($s,$m,$y);
            $this->render('StudentProfile',array('arrayOfLL'=>$arrayOfLL,'student'=>Student::model()->findByPk($s),'lang'=>Yii::app()->language));
        }
        public function actionGetSummaryProfile($levelid,$level='school')
        {
            
        }
        
}