<?php
/* @var $this CitizenRuralController */
/* @var $model CitizenRural */

$this->breadcrumbs=array(
	'Citizen Rurals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CitizenRural', 'url'=>array('index')),
	array('label'=>'Create CitizenRural', 'url'=>array('create')),
	array('label'=>'Update CitizenRural', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CitizenRural', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CitizenRural', 'url'=>array('admin')),
);
?>

<h1>View CitizenRural #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name_en',
		'name_hi',
		'father_name_en',
		'spouse_name_en',
		'father_name_hi',
		'spouse_name_hi',
		'revenue_village_code',
		'address',
		'mobile1',
		'mobile2',
		'photo',
		'gender',
	),
)); ?>
