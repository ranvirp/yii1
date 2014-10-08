<?php
/* @var $this PhotosController */
/* @var $data Photos */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bwid')); ?>:</b>
	<?php echo CHtml::encode($data->bwid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gpslat')); ?>:</b>
	<?php echo CHtml::encode($data->gpslat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gpslong')); ?>:</b>
	<?php echo CHtml::encode($data->gpslong); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gpsacc')); ?>:</b>
	<?php echo CHtml::encode($data->gpsacc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photourl')); ?>:</b>
	<?php echo CHtml::encode($data->photourl); ?>
	<br />


</div>