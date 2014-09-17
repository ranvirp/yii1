<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#formtab" role="tab" data-toggle="tab">Form</a></li>
  <li><a href="#attachments" role="tab" data-toggle="tab">Attachments</a></li>
  </ul>
<div class="tab-content">
	<div class="tab-pane active" id="formtab">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issues-form',
	'enableAjaxValidation'=>false,
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
		
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
	</div>

	</div>
<div class="row">
			<?php $this->widget('basicupload.basicJqueryFileUploadWidget');?>
		</div>
<div id='<?php echo get_class($model);?>-attachments'></div>