<?php
/* @var $this WorksController */
/* @var $model Works */
?>

<?php
$this->breadcrumbs=array(
	'Works'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Works', 'url'=>array('index')),
	array('label'=>'Create Works', 'url'=>array('create')),
	array('label'=>'Update Works', 'url'=>array('update', 'id'=>$model->bwid)),
	array('label'=>'Delete Works', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->bwid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Works', 'url'=>array('admin')),
);
?>

<h1>View Works #<?php echo $model->bwid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'bwid',
		'title',
		'gpslat',
		'gpslong',
		'finyear',
		'sanctioned_cost',
		'officerincharge',
		'schemecode',
	),
)); ?>