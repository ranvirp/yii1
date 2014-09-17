<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filesUploadBehaviour
 *
 * @author mac
 */

class filesUploadBehaviour extends CActiveRecordBehavior{
	//put your code here
	private $owner;
	public function init()
	{
		$this->owner=$this->getOwner();
	}
	function beforeSave($event) {
		$fieldnames=array();
		if (isset($_POST['fileid']))
		{
			
			foreach($_POST['fileid'] as $fieldname=>$fileidArr)
			{
				foreach ($fileidArr as $index=>$fileid){
			$fieldnames[$fieldname][]=$fileid;
				}
			}
			foreach ($fieldnames as $fname=>$arr)
			{
				$this->getOwner()->$fname=  implode(",",$arr);
			}
		}
		parent::beforeSave($event);
		
	}
	function afterSave($event) {
		$fieldnames=array();
		if (isset($_POST['fileid']))
		{
			foreach($_POST['fileid'] as $fieldname=>$fileidArr)
			{
				foreach ($fileidArr as $index=>$fileid){
				$file = Files::model()->findByPk($fileid);
				//$file->desc=print_r($_POST,true);
				$file->objecttype=get_class($this->getOwner());
				$file->objectid=$this->getOwner()->id;
				$file->uploadedby=Yii::app()->user->id;
				$file->fieldname=$fieldname;
				$file->save();
				}
			}
			
		}
		parent::afterSave($event);
		
		
	}
}
