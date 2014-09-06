<?php
/* @var $this SkillLevelController */
/* @var $model SkillLevel */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'category_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'name_hi',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'name_en',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'unit_hi',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'unit_en',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'level',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'subject_code',array('span'=>5,'maxlength'=>10)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->