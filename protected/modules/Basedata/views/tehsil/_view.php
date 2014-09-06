<?php
/* @var $this TehsilController */
/* @var $data Tehsil */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->code),array('view','id'=>$data->code)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_code')); ?>:</b>
	<?php echo CHtml::encode($data->district_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_hi')); ?>:</b>
	<?php echo CHtml::encode($data->name_hi); ?>
	<br />


</div>