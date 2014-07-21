<?php
/* @var $this PanchayatController */
/* @var $model Panchayat */
?>

<?php
$this->breadcrumbs=array(
	'Panchayats'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List Panchayat', 'url'=>array('index')),
	array('label'=>'Create Panchayat', 'url'=>array('create')),
	array('label'=>'Update Panchayat', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete Panchayat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Panchayat', 'url'=>array('admin')),
);
?>

<h1>View Panchayat #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'code',
		'block_code',
		'name_en',
		'name_hi',
	),
)); ?>