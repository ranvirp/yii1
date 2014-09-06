<?php
/* @var $this DesignationController */
/* @var $model Designation */
?>

<?php
$this->breadcrumbs=array(
	'Designations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Designation', 'url'=>array('index')),
	array('label'=>'Create Designation', 'url'=>array('create')),
	array('label'=>'Update Designation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Designation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Designation', 'url'=>array('admin')),
);
?>

<h1>View Designation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'designation_type_id',
		'level_type_id',
		'district_code',
	),
)); ?>