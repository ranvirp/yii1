<?php

class DefaultController extends Controller
{
        public $connectionId='db';
        public $tablePrefix='';
	public function actionIndex()
	{
            
            print $this->renderPartial('/common/code', array(
				'file'=>  dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates/_Importform.php'));
		
	}
        public function actionGetForm($m)
        {
            $model= new $m;
            $basedir=dirname(__FILE__)."/../views/default/$m";
           // print $basedir;
            //exit;
            if (!is_dir($basedir))
            mkdir($basedir);
            file_put_contents($basedir."/"."_import.php",$this->renderPartial('_importform',array('model'=>$model),true));
        $this->render($m."/_import",array('model'=>$model));
            }
        public function actionGetFormByModel($m)
        {
             $model= new $m;
            $this->render($m."/_import",array('model'=>$model));
        }
        protected function generateClassName($tableName)
	{
		

		$tableName=$this->removePrefix($tableName,false);
		if(($pos=strpos($tableName,'.'))!==false) // remove schema part (e.g. remove 'public2.' from 'public2.post')
			$tableName=substr($tableName,$pos+1);
		$className='';
		foreach(explode('_',$tableName) as $name)
		{
			if($name!=='')
				$className.=ucfirst($name);
		}
		return $className;
	}
        protected function removePrefix($tableName,$addBrackets=true)
	{
		if($addBrackets && Yii::app()->{$this->connectionId}->tablePrefix=='')
			return $tableName;
		$prefix=$this->tablePrefix!='' ? $this->tablePrefix : Yii::app()->{$this->connectionId}->tablePrefix;
		if($prefix!='')
		{
			if($addBrackets && Yii::app()->{$this->connectionId}->tablePrefix!='')
			{
				$prefix=Yii::app()->{$this->connectionId}->tablePrefix;
				$lb='{{';
				$rb='}}';
			}
			else
				$lb=$rb='';
			if(($pos=strrpos($tableName,'.'))!==false)
			{
				$schema=substr($tableName,0,$pos);
				$name=substr($tableName,$pos+1);
				if(strpos($name,$prefix)===0)
					return $schema.'.'.$lb.substr($name,strlen($prefix)).$rb;
			}
			elseif(strpos($tableName,$prefix)===0)
				return $lb.substr($tableName,strlen($prefix)).$rb;
		}
		return $tableName;
	}
}