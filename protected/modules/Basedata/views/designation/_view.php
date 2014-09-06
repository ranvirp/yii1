<?php
/* @var $this DesignationController */
/* @var $data Designation */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('designation_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->designation_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->level_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_code')); ?>:</b>
	<?php echo CHtml::encode($data->district_code); ?>
	<br />


</div>