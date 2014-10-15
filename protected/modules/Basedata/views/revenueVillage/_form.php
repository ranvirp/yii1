<?php
/* @var $this RevenueVillageController */
/* @var $model RevenueVillage */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'revenue-village-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   
    <?php   echo $form->dropDownListControlGroup($model,'tehsil_code',Tehsil::model()->listAll());  ?>
    
    	 <?php echo $form->textFieldControlGroup($model,'code',array('span'=>5,'maxlength'=>15)); ?>

    
    
    	 <?php echo $form->textFieldControlGroup($model,'name_en',array('span'=>5,'maxlength'=>45)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'name_hi',array('span'=>5,'maxlength'=>45,'class'=>'hindiinput')); ?>

    
    <?php   echo $form->dropDownListControlGroup($model,'panchayat_code',Panchayat::model()->listAll());  ?>
    
    	 <?php echo $form->textFieldControlGroup($model,'census_code',array('span'=>5,'maxlength'=>45)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->