<?php

class ImportController extends Controller
{
        public $connectionId='db';
        public $tablePrefix='';
		public $file = "/Users/mac/tehsils.xml";
		public $map_array=array
			(
			
		    );

	public function actionIndex()
	{
            
             $this->render('/common/code', array(
				'file'=>  dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates/_Importform.php'));
		
	}
        public function actionGetForm($m)
        {
            
			$model= new $m;
            $basedir=dirname(__FILE__)."/../views/import/$m";
           // print $basedir;
            //exit;
            if (!is_dir($basedir))
            mkdir($basedir,0777,true);
			
            file_put_contents($basedir."/"."_import.php",$this->renderPartial('_importform',array('model'=>$model),true));
            chmod($basedir."/"."_import.php",777);
			$this->render($m."/_import",array('model'=>$model));
            }
        public function actionGetFormByModel($m)
        {
             $model= new $m;
			 print "hi";
			 exit;
             $this->render("school/_import",array('model'=>$model));
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
	public function actionImportFromXML()
	{
		   // $term->vocabulary_machine_name = $vocabulary->machine_name;

$xml_parser = xml_parser_create();
// use case-folding so we are sure to find the tag in $map_array
xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, true);
xml_set_element_handler($xml_parser, 'startElement', 'endElement');
xml_set_character_data_handler($xml_parser, "characterData");
if (!($fp = fopen($file, "r"))) {
    die("could not open XML input");
}

while ($data = fread($fp, 4096)) {
    if (!xml_parse($xml_parser, $data, feof($fp))) {
        die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
    }
}
xml_parser_free($xml_parser);

	}
	function startElement($parser, $name, $attrs) 
{
    
	global $map_array;
	global $current_element;
	$name=  strtolower($name);
    if (isset($map_array[strtolower($name)])) {
       // echo "<$map_array[$name]>";
		$current_element=strtolower($name);
		
    }
}

function endElement($parser, $name) 
{
   global $map_array;
	global $current_element;
	global $term;
	global $vid;
	$name=strtolower($name);
   if (isset($map_array[strtolower($name)])) {
        //echo "</$map_array[$name]>";
		if (strcmp(strtolower($name), "name")==0)
		{
			taxonomy_term_save($term);
			 $term = new stdClass();
    $term->vid = $vid;
    //$term->vocabulary_machine_name = $vocabulary->machine_name;
		}
    }
}

function characterData($parser, $data) 
{
	global $map_array;
	global $current_element;
	global $term;
    echo $data;
	if (isset($map_array[$current_element])) {
      $t=$map_array[$current_element];
	  $term->$t=array('hi'=>array(array('value'=>$data)));
	  if ($current_element=='name')
		  $term->name=$data;
	  
	
	 
	 
	}
}

}