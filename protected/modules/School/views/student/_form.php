<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
		'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   
    
    
    
    <?php   echo $form->dropDownListControlGroup($model,'school_id',School::model()->listAll());  ?>
    
    	 <?php echo $form->dropDownListControlGroup($model,'class', range(1,5) ); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'name_hi',array('span'=>5,'maxlength'=>45,'class'=>'hindiinput')); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'name_en',array('span'=>5,'maxlength'=>45)); ?>

    
    	 <?php echo $form->dateFieldControlGroup($model,'date_of_birth'); ?>

    	 <?php echo $form->textFieldControlGroup($model,'age',array('span'=>5,'maxlength'=>4)); ?>

    
    	 <?php echo $form->fileFieldControlGroup($model,'photo',array('span'=>5,'maxlength'=>45)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'rollno',array('span'=>5,'maxlength'=>11)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'section',array('span'=>5,'maxlength'=>1)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->