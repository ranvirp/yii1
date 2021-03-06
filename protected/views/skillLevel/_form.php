<?php
/* @var $this SkillLevelController */
/* @var $model SkillLevel */
/* @var $form TbActiveForm */
?>
<script>
  function populateCategories(value)
  {
      $.get('<?php echo $this->createUrl('skillLevelCategory/GetBySubjectJSON/id');?>'+'/'+value,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#SkillLevel_category_id').html(htmlToAppend);    
            
          }
              
            )
  }
  </script>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'skill-level-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   
    
    
     <?php   echo $form->dropDownListControlGroup($model,'subject_code',Subject::model()->listAll(),array('onChange'=>'js:populateCategories($(this).val())'));  ?>
    <?php   echo $form->dropDownListControlGroup($model,'category_id',SkillLevelCategory::model()->listAll());  ?>
    
    	 <?php echo $form->textFieldControlGroup($model,'name_hi',array('span'=>5,'maxlength'=>45)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'name_en',array('span'=>5,'maxlength'=>45)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'unit_hi',array('span'=>5,'maxlength'=>45)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'unit_en',array('span'=>5,'maxlength'=>45)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'level',array('span'=>5,'maxlength'=>4)); ?>

    
   
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->