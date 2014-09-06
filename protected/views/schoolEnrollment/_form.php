<?php
/* @var $this SchoolEnrollmentController */
/* @var $model SchoolEnrollment */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'school-enrollment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   
    
    
    
    	 <?php echo $form->dropDownListControlGroup($model,'school_code',  School::listAll(),array('empty'=>'None')); ?>
	<table class="table">
		<tr><th>Class</th><th>Male Students</th><th>Female Students</th><th>Total</th></tr>
    <?php for ($i=1;$i<=5;$i++) {
		echo "<tr>".
			 "<td>$i</td>"
			 
			."<td>".TbHtml::textField("male$i",$post["male$i"],array('size'=>3)).'</td>'
			."<td>".TbHtml::textField("female$i",$post["female$i"],array('size'=>3)).'</td>'
			."<td>".TbHtml::textField("total$i",$post["total$i"],array('size'=>4)).'</td>'
		    .'</tr>';
		if (isset($errors[$i]))
		{
			echo '<tr><td colspan=4>'.'<p class="alert">'.$errors[$i].'</p>';
		}
	}
	?>
    </table>	 
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->