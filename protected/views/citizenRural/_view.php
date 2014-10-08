<?php
/* @var $this CitizenRuralController */
/* @var $data CitizenRural */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->name_hi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_name_en')); ?>:</b>
	<?php echo CHtml::encode($data->father_name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_name_en')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->father_name_hi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_name_hi); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('revenue_village_code')); ?>:</b>
	<?php echo CHtml::encode($data->revenue_village_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile1')); ?>:</b>
	<?php echo CHtml::encode($data->mobile1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile2')); ?>:</b>
	<?php echo CHtml::encode($data->mobile2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	*/ ?>

</div>