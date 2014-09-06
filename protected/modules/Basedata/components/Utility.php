<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utility
{
    /**
	* Returns all models in List of primary key,name format
	*/
	public static function listAllByAttributes($className,$attributes)
	{
	    $lang = Yii::app()->language;
        $models = $className::model()->findAllByAttributes($attributes);
        $pk = $className::model()->tableSchema->primaryKey;
        // format models resulting using listData     
        $list = CHtml::listData($models, $pk, 'name_'.$lang);
        return $list;
	}
	public static function getBlock($user_id)
	{
		$designation = Designation::model()->getDesignationModelByUser($user_id);
		$level = $designation->designationType->level->table_name;
		if ($level=='block')
			return $level::model()->findByPk($designation->level_type_id)->id;
		else 
			return '---';
	}
    
}