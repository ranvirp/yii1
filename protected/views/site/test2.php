<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	 'id'=>'test2',
	 'enableAjaxValidation'=>false,
     'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
 ));
?>
 <?php echo $form->errorSummary($model); ?>
<?php
opend

?>