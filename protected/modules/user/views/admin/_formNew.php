<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>
       
        <div class="row">

	<div class="col-md-5">
	   <div class="row">
             
	      <?php echo TbHtml::dropDownListControlGroup("roles",'',Rights::getAuthItemSelectOptions(2),array('empty'=>'None','label'=>'Role'));?>
	   </div>
            
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>
			<?php
			}
		}
?>
        </div>
            <div class="col-md-5">
	<div class="row">
	
		<?php echo $form->textFieldControlGroup($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		
	</div>

	<div class="row">
		
		<?php echo $form->passwordFieldControlGroup($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		
	</div>

	<div class="row">
	
		<?php echo $form->textFieldControlGroup($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		
	</div>

	<div class="row">
	
		<?php echo $form->dropDownListControlGroup($model,'superuser',User::itemAlias('AdminStatus')); ?>
		
	</div>

	<div class="row">
	
		<?php echo $form->dropDownListControlGroup($model,'status',User::itemAlias('UserStatus')); ?>
		
	</div>
	</div>
</div>
          <div class="row">
             
	      <?php $this->widget('OfficerWidget', array(
        'model' => $profile,
			'attribute'=>'designation',
)); ?>
	   </div>
	<div class="row buttons">
		<?php echo TbHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php 


?>