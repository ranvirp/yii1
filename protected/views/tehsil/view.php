<?php
/* @var $this TehsilController */
/* @var $model Tehsil */
?>

<?php
$this->breadcrumbs=array(
	'Tehsils'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List Tehsil', 'url'=>array('index')),
	array('label'=>'Create Tehsil', 'url'=>array('create')),
	array('label'=>'Update Tehsil', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete Tehsil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tehsil', 'url'=>array('admin')),
);
?>

<h1>View Tehsil #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'code',
		'district_code',
		'name_en',
		'name_hi',
	),
)); ?>