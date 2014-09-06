<?php
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createConsoleApplication($config);

$file = "/Users/mac/tehsils.xml";
$map_array = array(
    "code"     => "field_code",
    "name" => "name_field",
    
);
$current_element;
//$vid= _get_vid($vocabulary_name);
$vid=5;//tehsils
$vocabulary = taxonomy_vocabulary_load($vid);
    $term = new stdClass();
    $term->vid = $vid;
	
   // $term->vocabulary_machine_name = $vocabulary->machine_name;
function startElement($parser, $name, $attrs) 
{
    
	global $map_array;
	global $current_element;
	
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

function _get_vid($vocabulary_name) {
// replace dashes with spaces
$vocabulary_name = str_replace('-', ' ', $vocabulary_name);
// find the vid
$result = db_query("SELECT vid FROM {taxonomy_vocabulary} WHERE name = '%s'", array($vocabulary_name));
$vid = db_($result)->vid;
if($vid) {
return $vid;
}
else {
return FALSE;
}
}
?>
