<?php
/* @var $this DesignationController */
/* @var $model Designation */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'designation_type_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'level_type_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'district_code',array('span'=>5,'maxlength'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->