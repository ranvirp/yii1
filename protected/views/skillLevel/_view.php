<?php
/* @var $this SkillLevelController */
/* @var $data SkillLevel */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->name_hi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_hi')); ?>:</b>
	<?php echo CHtml::encode($data->unit_hi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_en')); ?>:</b>
	<?php echo CHtml::encode($data->unit_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('subject_code')); ?>:</b>
	<?php echo CHtml::encode($data->subject_code); ?>
	<br />

	*/ ?>

</div>