<?php

class BasedataModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		
		if (!Yii::app()->user->checkAccess('Base Data Manager'))
		{
			throw new CHttpException(400,'Invalid request.');
		}
		$this->setImport(array(
			'Basedata.models.*',
			'Basedata.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			$this->layoutPath = Yii::getPathOfAlias('Basedata.views.layouts');
        $this->layout = 'column2';
			return true;
		}
		else
			return false;
	}
}
