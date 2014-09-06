<?php
/* @var $this StateController */
/* @var $model State */
?>

<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List State', 'url'=>array('index')),
	array('label'=>'Create State', 'url'=>array('create')),
	array('label'=>'Update State', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete State', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage State', 'url'=>array('admin')),
);
?>

<h1>View State #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'code',
		'name_en',
		'name_hi',
	),
)); ?>