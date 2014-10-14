<?php
/* @var $this DesignationController */
/* @var $model Designation */
/* @var $form TbActiveForm */
?>
<script>
  function populateLevels(value)
  
  {
	  dist=$('#dist_code').val();
      $.get('<?php echo $this->createUrl('designation/GetByTypeJSON/id');?>'+'/'+value+'/dist/'+dist,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#DesignationAssign_designation_id').html(htmlToAppend);    
            
          }
              
            )
  }
    function populateDesignationTypes(value)
  {
      $.get('<?php echo $this->createUrl('designationType/GetDesignationTypesJSON/id');?>'+'/'+value,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#DesignationAssign_designation_type_id').html(htmlToAppend);    
            
          }
              
            )
  }
  </script>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'designation-assign-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        //'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php $this->widget('OfficerWidget',array('model'=>$model,'attribute'=>'designation_id'));?>
    </div>
	<div class="row-fluid">
	<label class="control-label required" for="DesignationUser_user_id">
User:
<span class="required">*</span>
</label>
	<div class="controls">
	 <?php   echo TbHtml::dropDownList('DesignationUser[user_id]','',CHtml::listData(User::model()->findAll(),'id','username'),array('id'=>'DesignationUser_level_type_id'));  ?>
	</div>
	</div>
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->