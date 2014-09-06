<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImportinfoController
 *
 * @author mac
 */
class ImportinfoController extends Controller{
	//put your code here
	public function actionCreate()
	{
		$model=new Importinfo;
		if (isset($_POST['Importinfo']))
		{
			
			//$model->filename=$_POST['importinfo']['filename'];
			//$model->modelName=$_POST['importinfo']['modelName'];
			$model->attributes=$_POST['Importinfo'];
			
			if ($model->save())
			{
				$this->redirect(array('view','id'=>$model->id));
			}
			
		}
		$this->render('_form',array(
			'model'=>$model,
		));
	}
}

?>
