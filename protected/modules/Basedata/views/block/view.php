<?php
/* @var $this BlockController */
/* @var $model Block */
?>

<?php
$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List Block', 'url'=>array('index')),
	array('label'=>'Create Block', 'url'=>array('create')),
	array('label'=>'Update Block', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete Block', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Block', 'url'=>array('admin')),
);
?>

<h1>View Block #<?php echo $model->code; ?></h1>

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