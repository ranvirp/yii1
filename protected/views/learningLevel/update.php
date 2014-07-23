<?php
/* @var $this LearningLevelController */
/* @var $model LearningLevel */
?>

<?php
$this->breadcrumbs=array(
	'Learning Levels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LearningLevel', 'url'=>array('index')),
	array('label'=>'Create LearningLevel', 'url'=>array('create')),
	array('label'=>'View LearningLevel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LearningLevel', 'url'=>array('admin')),
);
?>

    <h1>Update LearningLevel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>