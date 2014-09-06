<?php
/* @var $this SchoolEnrollmentController */
/* @var $model SchoolEnrollment */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'school_code',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'class',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'male',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'female',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'total',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'created_user',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->