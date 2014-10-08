<?php
/* @var $this CitizenRuralController */
/* @var $model CitizenRural */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'citizen-rural-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php $lang=Yii::app()->language;?>
<div class="col-md-5">
	<div class="row">
		<?php echo $form->labelEx($model,'name_'.$lang); ?>
		<?php echo $form->textField($model,'name_'.$lang,array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name_'.$lang); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'father_name_'.$lang); ?>
		<?php echo $form->textField($model,'father_name_'.$lang,array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'father_name_'.$lang); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spouse_name_'.$lang); ?>
		<?php echo $form->textField($model,'spouse_name_'.$lang,array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'spouse_name_'.$lang); ?>
	</div>



	<div class="row">
          	<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	
</div>
<div class="col-md-5">
    <div class="row">
		<?php echo $form->labelEx($model,'mobile1'); ?>
		<?php echo $form->textField($model,'mobile1',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'mobile1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobile2'); ?>
		<?php echo $form->textField($model,'mobile2',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'mobile2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->textArea($model,'photo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'photo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>        
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->