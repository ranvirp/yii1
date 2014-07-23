<?php
/* @var $this SchoolController */
/* @var $data School */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->name_hi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rural_urban')); ?>:</b>
	<?php echo CHtml::encode($data->rural_urban); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_type')); ?>:</b>
	<?php echo CHtml::encode($data->location_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location_code')); ?>:</b>
	<?php echo CHtml::encode($data->location_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dise_code')); ?>:</b>
	<?php echo CHtml::encode($data->dise_code); ?>
	<br />


</div>