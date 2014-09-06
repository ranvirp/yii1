<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->name_hi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_code')); ?>:</b>
	<?php echo CHtml::encode($data->state_code); ?>
	<br />


</div>