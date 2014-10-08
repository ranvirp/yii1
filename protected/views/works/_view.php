<?php
/* @var $this WorksController */
/* @var $data Works */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('bwid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bwid),array('view','id'=>$data->bwid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gpslat')); ?>:</b>
	<?php echo CHtml::encode($data->gpslat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gpslong')); ?>:</b>
	<?php echo CHtml::encode($data->gpslong); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finyear')); ?>:</b>
	<?php echo CHtml::encode($data->finyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sanctioned_cost')); ?>:</b>
	<?php echo CHtml::encode($data->sanctioned_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('officerincharge')); ?>:</b>
	<?php echo CHtml::encode($data->officerincharge); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('schemecode')); ?>:</b>
	<?php echo CHtml::encode($data->schemecode); ?>
	<br />

	*/ ?>

</div>