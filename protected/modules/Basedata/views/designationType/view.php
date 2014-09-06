<?php
/* @var $this DesignationTypeController */
/* @var $model DesignationType */
?>

<?php
$this->breadcrumbs=array(
	'Designation Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DesignationType', 'url'=>array('index')),
	array('label'=>'Create DesignationType', 'url'=>array('create')),
	array('label'=>'Update DesignationType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DesignationType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DesignationType', 'url'=>array('admin')),
);
?>

<h1>View DesignationType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name_hi',
		'code',
		'department_id',
		'name_en',
		'level_id',
	),
)); ?>