<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OfficerWidget
 *
 * @author mac
 */
class OfficerWidget extends CWidget{
	//put your code here
	 public $model;
	 public $attribute;

    public function run()
    {
        if (! $this->model instanceof CModel) {
            throw new RuntimeException('No valid model available.');
        }
        $this->render('designationFormWidget', array(
			'model'=>$this->model,
			'attribute'=>$this->attribute,
			),FALSE);
    }
}
