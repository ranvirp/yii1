<?php
/* @var $this LanddisputesController */
/* @var $model Landdisputes */
?>

<?php
$this->breadcrumbs=array(
	'Landdisputes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Landdisputes', 'url'=>array('index')),
	array('label'=>'Create Landdisputes', 'url'=>array('create')),
	array('label'=>'Update Landdisputes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Landdisputes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Landdisputes', 'url'=>array('admin')),
);
?>

<h1>View Landdisputes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'complainants',
		'oppositions',
		'revenuevillage',
		'policestation',
		'gatanos',
		'category',
		'description',
		'courtcasepending',
		'courtcasedetails',
		'policerequired',
		'nextdateofaction',
		'disputependingfor',
		'casteorcommunal',
	),
)); ?>