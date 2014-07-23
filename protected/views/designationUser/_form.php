<?php
/* @var $this DesignationUserController */
/* @var $model DesignationUser */
/* @var $form TbActiveForm */
?>
<script>
  function populateDesignation(value)
  {
      $.get('<?php echo $this->createUrl('designation/GetByType/id');?>'+'/'+value,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#DesignationUser_designation_id').html(htmlToAppend);    
            
          }
              
            )
  }
  </script>
  
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'designation-user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   <div class="row-fluid">
    <?php echo TbHtml::labelTb(Yii::t('app','Designation:')); ?>
    <?php echo TbHtml::dropDownList('designation_type','0' ,array_merge(array(0=>'None'),  DesignationType::model()->listAll()),array('onChange'=>'js:populateDesignation($(this).val())'));?>
    
    <?php   echo TbHtml::dropDownList('DesignationUser_designation_id','',Designation::model()->listAll());  ?>
   </div>
    <?php   echo $form->dropDownListControlGroup($model,'user_id',CHtml::listData(User::model()->findAll(),'id','email'));  ?>
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->