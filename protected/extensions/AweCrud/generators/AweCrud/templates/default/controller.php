<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php echo "<?php\n"; ?>

class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass."\n"; ?>
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    public $layout = '<?php echo $this->layout ?>';

<?php if($this->defaultAction !== 'none'): ?>
    public $defaultAction = '<?php echo $this->defaultAction; ?>';

<?php endif; ?>
<?php
$authpath = 'ext.AweCrud.generators.AweCrud.templates.default.auth.';
Yii::app()->controller->renderPartial($authpath . $this->authtype);
?>
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new <?php echo $this->modelClass; ?>;

<?php if (in_array($this->validation, array(1, 3))): ?>
        $this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass)?>-form');
<?php endif; ?>

        if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
<?php if($this->getUseRelatedRecordBehavior()): ?>
<?php   foreach(CActiveRecord::model($this->modelClass)->relations() as $key => $relation):?>
<?php       if($relation[0] == CActiveRecord::BELONGS_TO || $relation[0] == CActiveRecord::MANY_MANY): ?>
                <?php echo "if (isset(\$_POST['$this->modelClass']['$key'])) \$model->$key = \$_POST['$this->modelClass']['$key'];" . PHP_EOL; ?>
<?php       endif; ?>
<?php   endforeach; ?>
<?php endif; ?>
			$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];
			if($model->save()) {
<?php if(!$this->getUseRelatedRecordBehavior()): ?>
<?php   foreach(CActiveRecord::model($this->modelClass)->relations() as $key => $relation):?>
<?php       if($relation[0] == CActiveRecord::MANY_MANY): ?>
                <?php echo "if (isset(\$_POST['$this->modelClass']['$key'])) \$model->saveManyMany('$key', \$_POST['$this->modelClass']['$key']);" . PHP_EOL; ?>
<?php       endif; ?>
<?php   endforeach; ?>
<?php endif; ?>
                $this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
            }
		}

		$this->render('create',array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

<?php if (in_array($this->validation, array(1, 3))): ?>
        $this->performAjaxValidation($model, '<?php echo $this->class2id($this->modelClass)?>-form');
<?php endif; ?>

		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
<?php if($this->getUseRelatedRecordBehavior()): ?>
<?php   foreach(CActiveRecord::model($this->modelClass)->relations() as $key => $relation):?>
<?php       if($relation[0] == CActiveRecord::BELONGS_TO || $relation[0] == CActiveRecord::MANY_MANY): ?>
                <?php echo "if (isset(\$_POST['$this->modelClass']['$key'])) \$model->$key = \$_POST['$this->modelClass']['$key'];" . PHP_EOL; ?>
                <?php echo "\$model->$key = array();" . PHP_EOL; ?>
<?php       endif; ?>
<?php   endforeach; ?>
<?php endif; ?>
			$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];
			if($model->save()) {
<?php if(!$this->getUseRelatedRecordBehavior()): ?>
<?php   foreach(CActiveRecord::model($this->modelClass)->relations() as $key => $relation):?>
<?php       if($relation[0] == CActiveRecord::MANY_MANY): ?>
                <?php echo "if (isset(\$_POST['$this->modelClass']['$key'])) \$model->saveManyMany('$key', \$_POST['$this->modelClass']['$key']);" . PHP_EOL; ?>
                <?php echo "else \$model->saveManyMany('$key', array());" . PHP_EOL; ?>
<?php       endif; ?>
<?php   endforeach; ?>
<?php endif; ?>
				$this->redirect(array('view','id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
            }
		}

		$this->render('update',array(
			'model' => $model,
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
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('<?php echo $this->modelClass; ?>');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new <?php echo $this->modelClass; ?>('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->attributes = $_GET['<?php echo $this->modelClass; ?>'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id, $modelClass=__CLASS__)
	{
		$model = <?php echo $this->modelClass; ?>::model()->findByPk($id);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model, $form=null)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === '<?php echo $this->class2id($this->modelClass); ?>-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
