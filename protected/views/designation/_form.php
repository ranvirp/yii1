<?php
/* @var $this DesignationController */
/* @var $model Designation */
/* @var $form TbActiveForm */
?>
<script>
  function populateLevels(value)
  {
      $.get('<?php echo $this->createUrl('designation/GetLevelsByTypeJSON/id');?>'+'/'+value,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#Designation_level_type_id').html(htmlToAppend);    
            
          }
              
            )
  }
  </script>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'designation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   
    
    
    
    	
    
    	

    
		<label class="control-label required" for="Designation_designation_type_id">
Designation
<span class="required">*</span>
</label>
	<div class="controls">
    <?php   echo TbHtml::dropDownList('Designation[designation_type_id]','',array_merge(array(0=>'None'),DesignationType::model()->listAll()),array('id'=>'Designation_designation_type_id','onChange'=>'js:populateLevels($(this).val())'));  ?>
    
    <?php   echo TbHtml::dropDownList('Designation[level_type_id]','',array(),array('id'=>'Designation_level_type_id'));  ?>
</div>
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->