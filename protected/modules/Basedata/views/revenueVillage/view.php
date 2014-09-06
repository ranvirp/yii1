<?php
/* @var $this RevenueVillageController */
/* @var $model RevenueVillage */
?>

<?php
$this->breadcrumbs=array(
	'Revenue Villages'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List RevenueVillage', 'url'=>array('index')),
	array('label'=>'Create RevenueVillage', 'url'=>array('create')),
	array('label'=>'Update RevenueVillage', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete RevenueVillage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RevenueVillage', 'url'=>array('admin')),
);
?>

<h1>View RevenueVillage #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'code',
		'tehsil_code',
		'name_en',
		'name_hi',
		'panchayat_code',
		'census_code',
	),
)); ?>