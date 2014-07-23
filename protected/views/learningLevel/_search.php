<?php
/* @var $this LearningLevelController */
/* @var $model LearningLevel */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'value',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'student_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'skill_level_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'month',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'year',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'creation_user',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'creation_time',array('span'=>5,'maxlength'=>45)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->