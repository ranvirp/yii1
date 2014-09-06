<?php
/* @var $this SchoolController */
/* @var $model School */
/* @var $form TbActiveForm */
?>
<script>
	function locationDropDown(ru)
	  {
		  
		  if (ru=='r')
			  {
			    $('#School_location_type').val('RevenueVillage'); 

			   }
		  else if (ru=='u')
			  {
				 $('#School_location_type').val('Ward'); 

			  }
			  	$.get('<?php echo $this->createUrl('school/getLocationForm/t/');?>'+'/'+ru+'/name/School_location_code',
			    function(data)
				  {
					  $('#location_container').html(data);
				  }
			     );
			  
	  }
	  
</script>
<style>
	#School_rural_urban > label
	{
		display:inline-block;
		margin-top:5px;
		vertical-align: middle;
	}
</style>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'school-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
	<fieldset>
		<legend><?php echo Yii::t('app','Location Information');?></legend>
	<div class="row-fluid">
   
     <?php   echo $form->radioButtonListControlGroup($model,'rural_urban',array('r'=>Yii::t('app','Rural'),'u'=>Yii::t('app','Urban')),array('labelOptions'=>array('class'=>'inline'),'onChange'=>'js:locationDropDown($(this).val())'));  ?>
  
	</div>
	<div class="row-fluid">
    	 <?php echo CHtml::activeHiddenField($model,'location_type'); ?>
	</div>
	
	<div class="row-fluid">
    <div id="location_container" class="well">
		
	</div>
	</div>
    <div class="row-fluid">
     <?php echo $form->textFieldControlGroup($model,'dise_code',array('span'=>5,'maxlength'=>45)); ?>

    </div>
	<div class="row-fluid">
		
    	 <?php echo $form->textFieldControlGroup($model,'name_en',array('span'=>5,'maxlength'=>45)); ?>
	</div>
	<div class="row-fluid">
    
    	 <?php echo $form->textFieldControlGroup($model,'name_hi',array('span'=>5,'maxlength'=>45)); ?>
	</div>
    
     	 
    
    	
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	$.ready(
	  locationDropDown('r')
	  );
</script>