<?php
/* @var $this WorksController */
/* @var $model Works */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'works-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   
    
    	 <?php echo $form->textFieldControlGroup($model,'bwid',array('span'=>5,'maxlength'=>20)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>1000)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'gpslat',array('span'=>5,'maxlength'=>10)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'gpslong',array('span'=>5,'maxlength'=>10)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'finyear',array('span'=>5,'maxlength'=>8)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'sanctioned_cost',array('span'=>5,'maxlength'=>10)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'officerincharge',array('span'=>5,'maxlength'=>10)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'schemecode',array('span'=>5,'maxlength'=>10)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->