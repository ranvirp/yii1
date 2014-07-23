<?php
/* @var $this LearningLevelController */
/* @var $model LearningLevel */
?>

<?php
$this->breadcrumbs=array(
	'Learning Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LearningLevel', 'url'=>array('index')),
	array('label'=>'Create LearningLevel', 'url'=>array('create')),
	array('label'=>'Update LearningLevel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LearningLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LearningLevel', 'url'=>array('admin')),
);
?>

<h1>View LearningLevel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'value',
		'student_id',
		'skill_level_id',
		'month',
		'year',
		'creation_user',
		'creation_time',
	),
)); ?>