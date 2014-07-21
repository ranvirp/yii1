<?php
/* @var $this SkillLevelController */
/* @var $model SkillLevel */
?>

<?php
$this->breadcrumbs=array(
	'Skill Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SkillLevel', 'url'=>array('index')),
	array('label'=>'Create SkillLevel', 'url'=>array('create')),
	array('label'=>'Update SkillLevel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SkillLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SkillLevel', 'url'=>array('admin')),
);
?>

<h1>View SkillLevel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'category_id',
		'name_hi',
		'name_en',
		'unit_hi',
		'unit_en',
		'level',
		'subject_code',
	),
)); ?>