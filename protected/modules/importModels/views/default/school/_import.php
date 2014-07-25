 <?php

/* @var $model School */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'School-Import form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <table class='table'><tr><th>Column of Model</th><th>Type</th><th>Col. No. in XLSX</th></tr>     <?php echo '<tr><td>name_en</td><td>string<td>'.TbHtml::dropDownList('name_en'.'_xlsx',1,range(1,30)); ?>

     <?php echo '<tr><td>name_hi</td><td>string<td>'.TbHtml::dropDownList('name_hi'.'_xlsx',2,range(1,30)); ?>

     <?php echo '<tr><td>rural_urban</td><td>string<td>'.TbHtml::dropDownList('rural_urban'.'_xlsx',3,range(1,30)); ?>

     <?php echo '<tr><td>location_type</td><td>string<td>'.TbHtml::dropDownList('location_type'.'_xlsx',4,range(1,30)); ?>

     <?php echo '<tr><td>location_code</td><td>string<td>'.TbHtml::dropDownList('location_code'.'_xlsx',5,range(1,30)); ?>

     <?php echo '<tr><td>dise_code</td><td>string<td>'.TbHtml::dropDownList('dise_code'.'_xlsx',6,range(1,30)); ?>

    
    <label for="row_initial">Initial Row No:</label><input type="text" value="" name="row_initial" id="row_initial" />    
    <label for="row_final">  Final Row No:</label><input type="text" value="" name="row_final" id="row_final" />    
    <label for="new_file"> New file:</label> <input type="file" value="" name="new_file" id="new_file" />    
    <label for="existing_file">Existing file:</label><select name="existing_file" id="existing_file">
</select>    
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
            'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form --> 