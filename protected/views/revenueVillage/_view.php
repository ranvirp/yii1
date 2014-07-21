<?php
/* @var $this RevenueVillageController */
/* @var $data RevenueVillage */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code),array('view','id'=>$data->code)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tehsil_code')); ?>:</b>
	<?php echo CHtml::encode($data->tehsil_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->name_hi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('panchayat_code')); ?>:</b>
	<?php echo CHtml::encode($data->panchayat_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('census_code')); ?>:</b>
	<?php echo CHtml::encode($data->census_code); ?>
	<br />


</div>