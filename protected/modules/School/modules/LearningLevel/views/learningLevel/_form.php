<?php
/* @var $this LearningLevelController */
/* @var $model LearningLevel */
/* @var $form TbActiveForm */
?>
<script>
  function populateStudents(value)
  {
      $.get('<?php echo $this->createUrl('student/GetBySchoolJSON/id');?>'+'/'+value,
          function(data)
          {
              data = $.parseJSON(data)
              
            if (data.status == "OK" )
            {
               
                var htmlToAppend='';
              $.each(data.data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

               
                 $('#LearningLevel_student_id').html(htmlToAppend);    
            }
          }
              
            )
  }
  function populateForm(month)
  {
      $.get('<?php echo $this->createUrl('LearningLevel/getForm/s/');?>'+'/'+$('#LearningLevel_student_id option:selected').val()+'/m'+'/'+month,
          function(data)
          {
             

                 $('#LearningLevel_formContainer').html(data);    
            }
          
              
            )
  }
</script>
<style>
    #LearningLevel_formContainer{
        
    }
</style>
<?php echo TbHtml::well(TbHtml::labelTb(Yii::t('app','Select School:'))." ".TbHtml::dropDownList('school-id', '0', array_merge(array('0'=>"None"),School::model()->listAll()),array('onChange'=>'js:populateStudents($(this).val())'))

, array('size' => TbHtml::WELL_SIZE_LARGE)); ?>
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'learning-level-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

  

    <?php echo $form->errorSummary($model); ?>
   
     <?php   echo $form->dropDownListControlGroup($model,'student_id',array());  ?>
    
     <?php echo $form->dropDownListControlGroup($model,'month',UtilityController::monthDropdown('month'),array('onChange'=>'js:populateForm($(this).val())')); ?>

     <?php echo $form->textFieldControlGroup($model, 'year', array('value'=>date('Y'),'type'=>'hidden'));?>	

        <div id="LearningLevel_formContainer" class="well">
    
        </div>
   
    

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
