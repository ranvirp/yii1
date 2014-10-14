<?php
/* @var $this PwdUnitController */
/* @var $model PwdUnit */
?>

<?php
$this->breadcrumbs=array(
	'Pwd Units'=>array('index'),
	$model->code,
);

$this->menu=array(
	array('label'=>'List PwdUnit', 'url'=>array('index')),
	array('label'=>'Create PwdUnit', 'url'=>array('create')),
	array('label'=>'Update PwdUnit', 'url'=>array('update', 'id'=>$model->code)),
	array('label'=>'Delete PwdUnit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PwdUnit', 'url'=>array('admin')),
);
?>

<h1>View PwdUnit #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'code',
		'district_code',
		'name_hi',
		'name_en',
	),
)); ?>