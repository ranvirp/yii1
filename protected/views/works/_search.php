<?php
/* @var $this WorksController */
/* @var $model Works */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'bwid',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>1000)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gpslat',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gpslong',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'finyear',array('span'=>5,'maxlength'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'sanctioned_cost',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'officerincharge',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'schemecode',array('span'=>5,'maxlength'=>10)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->