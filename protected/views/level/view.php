<?php
/* @var $this LevelController */
/* @var $model Level */
?>

<?php
$this->breadcrumbs=array(
	'Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Level', 'url'=>array('index')),
	array('label'=>'Create Level', 'url'=>array('create')),
	array('label'=>'Update Level', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Level', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Level', 'url'=>array('admin')),
);
?>

<h1>View Level #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name_hi',
		'name_en',
		'table_name',
	),
)); ?>