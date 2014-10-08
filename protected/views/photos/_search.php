<?php
/* @var $this PhotosController */
/* @var $model Photos */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'bwid',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gpslat',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gpslong',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gpsacc',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'photourl',array('span'=>5,'maxlength'=>1000)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->