<?php
/* @var $this LanddisputesController */
/* @var $model Landdisputes */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'complainants',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'oppositions',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'revenuevillage',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'policestation',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'gatanos',array('span'=>5,'maxlength'=>220)); ?>

                    <?php echo $form->textFieldControlGroup($model,'category',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'courtcasepending',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'courtcasedetails',array('span'=>5,'maxlength'=>1000)); ?>

                    <?php echo $form->textFieldControlGroup($model,'policerequired',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'nextdateofaction',array('span'=>5,'maxlength'=>200)); ?>

                    <?php echo $form->textFieldControlGroup($model,'disputependingfor',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'casteorcommunal',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->