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

	<b><?php echo CHtml::encode($data->getAttributeLabel('revenue_viilage_code')); ?>:</b>
	<?php echo CHtml::encode($data->revenue_viilage_code); ?>
	<br />


</div>