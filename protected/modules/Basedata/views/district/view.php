<?php
/* @var $this DistrictController */
/* @var $model District */
?>

<?php
$this->breadcrumbs=array(
	'Districts'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List District', 'url'=>array('index')),
	array('label'=>'Create District', 'url'=>array('create')),
	array('label'=>'Update District', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete District', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage District', 'url'=>array('admin')),
);
?>

<h1>View District #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'state_code',
		'code',
		'name_en',
		'name_hi',
	),
)); ?>