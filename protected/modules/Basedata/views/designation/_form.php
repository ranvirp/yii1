<?php
/* @var $this DesignationController */
/* @var $model Designation */
/* @var $form TbActiveForm */
?>
<script>
	function populateLevels(value)
	{
		dist = $('#Designation_district_code').val();
		$.get('<?php echo $this->createUrl('designation/GetLevelsByTypeJSON/id'); ?>'+'/'+value+'/dist/'+dist,
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
    function populateDesignationTypes(value)
	{
		$.get('<?php echo $this->createUrl('designationType/GetDesignationTypesJSON/id'); ?>'+'/'+value,
		function(data)
		{
			data = $.parseJSON(data)
            
               
			var htmlToAppend='<option value="">None</option>';
			
			$.each(data,function(key,value)
			{
				htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
			});

                 
			$('#Designation_designation_type_id').html(htmlToAppend);    
            
		}
              
	)
	}
</script>
<style>
	td
	{
		text-align: left;
	}
</style>
<div class="form">

	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'designation-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
		'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
		));
	?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php $lang=Yii::app()->language;$name='name_'.$lang; ?>

	<table class="table table-bordered">
		<tr>
			<td>

    <label class="control-label" for="Designation_district_code">
		District:
	</label>
			</td>
			<td>
	<?php
	if (Yii::app()->user->checkAccess('Authority')) {

		echo TbHtml::dropDownList('Designation[district_code]', '', District::model()->listAll());
	} else {
		$userDesignation = Designation::model()->getDesignationModelByUser(Yii::app()->user->id);
		if ($userDesignation)
		   {
			$district_code = $userDesignation->designation->district_code;
			$district_name = $userDesignation->designation->district->$name;
			
		   }
		else
			$district_code = null;
		if ($model->district_code)
		   echo TbHtml::hiddenField('Designation[district_code]', $model->district_code);
		else 
			echo TbHtml::hiddenField('Designation[district_code]', $district_code);

		echo '<span>'.$district_name.'</span>';
		
		
	}
	?>
			</td></tr>

		<tr><td>
				<label class="control-label">Department:</label>
			</td><td>
		<?php echo TbHtml::dropDownList('deptDropDown', $model->designationType?$model->designationType->department_id:'', Department::model()->listAll(), array('empty' => 'None', 'onChange' => 'js:populateDesignationTypes($(this).val())')); ?>
			</td>
		</tr>
		<tr>
			<td>
	<label class="control-label required" for="Designation_designation_type_id">
		Designation
		<span class="required">*</span>
	</label>
			</td><td>
		<?php echo TbHtml::dropDownList('Designation[designation_type_id]', $model->designation_type_id, Utility::listAllByAttributes('DesignationType', array('department_id'=>$model->designationType?$model->designationType->department->id:null)), array('id' => 'Designation_designation_type_id','empty'=>'None', 'onChange' => 'js:populateLevels($(this).val())')); ?>
		<?php 
		if ($model->designationType?$model->designationType->level->name_en:'' !='District')
		{
		 if ($model->designationType->level->name_en)
		echo TbHtml::dropDownList('Designation[level_type_id]', $model->level_type_id, Utility::listAllByAttributes($model->designationType?$model->designationType->level->name_en:null, array('district_code'=>$model->district_code)), array('id' => 'Designation_level_type_id')); 
		else 
			echo TbHtml::dropDownList('Designation[level_type_id]', $model->level_type_id, array(), array('id' => 'Designation_level_type_id')); 
		
		 
		}
	 else 
	 	echo TbHtml::dropDownList('Designation[level_type_id]', $model->level_type_id, Utility::listAllByAttributes($model->designationType?$model->designationType->level->name_en:null, array('code'=>$model->district_code)), array('id' => 'Designation_level_type_id')); ?>
	 
	 
			</td>
		</tr>
	</table>
    <div class="form-actions">
<?php
echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
	'color' => TbHtml::BUTTON_COLOR_PRIMARY,
	'size' => TbHtml::BUTTON_SIZE_LARGE,
));
?>
    </div>

	<?php $this->endWidget(); ?>

</div><!-- form -->