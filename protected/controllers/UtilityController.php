<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UtilityController extends Controller

{
	public  static $uploadPath;
	public function init(){
	 self::$uploadPath=Yii::app()->getBasePath().'/../uploads/';
	 parent::init();
	 
	}
    public function actionTest()
    {
        $this->render('test');
    }
	public function actionUploads()
	{
	  	
	  $segmentsArr = explode('/', Yii::app()->request->pathInfo);
	  $fileName='';
	  for ($i=2;$i<count($segmentsArr);$i++)
	  {
		 $fileName.='/'.$segmentsArr[$i]; 
	  }
	  $filePath=self::$uploadPath.'/'.$fileName;
	 // print $filePath;
	 // exit;
	  if (file_exists($filePath))
	  {
		  $content=file_get_contents($filePath);
	     Yii::app()->getRequest()->sendFile($fileName, $content);
		 
		 
	  }	 
	  else 
	  {
		  
		  print "File $filePath:Not found";
	  }
	  
	 }
   public static function monthDropdown($name="month", $selected=null)
{
        $dd = '<select name="'.$name.'" id="'.$name.'">';

        $months = array(
                1 => Yii::t('app','January'),
                2 => Yii::t('app','February'),
                3 => Yii::t('app','March'),
                4 => Yii::t('app','April'),
                5 => Yii::t('app','May'),
                6 => Yii::t('app','June'),
                7 => Yii::t('app','July'),
                8 => Yii::t('app','August'),
                9 => Yii::t('app','September'),
                10 =>Yii::t('app', 'October'),
                11 => Yii::t('app','November'),
                12 => Yii::t('app','December'));
        /*** the current month ***/
        return $months;
        $selected = is_null($selected) ? date('n', time()) : $selected;

        for ($i = 1; $i <= 12; $i++)
        {
                $dd .= '<option value="'.$i.'"';
                if ($i == $selected)
                {
                        $dd .= ' selected';
                }
                /*** get the month ***/
                $dd .= '>'.$months[$i].'</option>';
        }
        $dd .= '</select>';
        return $dd;
}

  public static function getUrlSegment($part) {
    
    $segementsArr = explode('/', Yii::app()->request->pathInfo);

    if (!empty($segementsArr[$part-1])) return $segementsArr[$part-1];
    
    return false;
    
  }

    
}

