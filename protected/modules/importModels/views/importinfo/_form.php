<div class="form">
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'importinfo-form',
	'enableAjaxValidation'=>false,
     'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    )
));
?>
	<?php echo $form->errorSummary($model); print_r($model->errors);?>
<?php
//Next ask them to upload files
	
echo $form->fileFieldControlGroup($model,'filename');
echo $form->textFieldControlGroup($model,'modelName');
?>

<div class="form-actions">
        <?php echo TbHtml::submitButton('Create' ,array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
            'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget();; ?>

</div><!-- form -->