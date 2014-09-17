<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issues-form',
	'enableAjaxValidation'=>TRUE,
	//'enableClientValidation'=>TRUE,
	'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	
	<div class="row">
		<div class='form-group'>
		<?php echo CHtml::label('Scheme:',false); ?>
		<?php echo $form->dropDownList($model,'schemeid',CHtml::listData(Schemes::model()->findAll(),'id','name'),array('empty'=>'Select Scheme'));?>
		<?php echo $form->error($model,'schemeid'); ?>
	
	<?php echo $form->hiddenField($model,'from',array('value'=>''));?>
		</div>
	<?php 
	//echo $form->hiddenField($model,'attachments',array('value'=>''));
	?>
	<div class='form-group'>
		<?php echo $form->labelEx($model,'from'); ?>


		<?php $this->widget('OfficerWidget', array(
        'model' => $model,
			'attribute'=>'from',
)); ?>
	

	

</div>		
	<div class='form-group'>
		<?php echo $form->labelEx($model,'to'); ?>


		<?php $this->widget('OfficerWidget', array(
        'model' => $model,
			'attribute'=>'to',
)); ?>
	

	

</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>5,'cols'=>100)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
<div class="row">
	<?php echo $form->hiddenField($model,'attachments',array('value'=>""));?>
		</div>
<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton("Save","",
		array('dataType'=>'json',
		'success'=>"function(data)
                {
				if (!data.redirect){
                    // Update the status
                    $('.form').html(data.html);
					}
				else {
				alert(data.redirect);
				   window.location.replace(data.redirect);
				   }
                    
 
                } "),array("style"=>"visibility:hidden","id"=>"st1")); ?>
	</div>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->

	