<?php
/* @var $this LearningLevelController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Learning Levels',
);

$this->menu=array(
	array('label'=>'Create LearningLevel','url'=>array('create')),
	array('label'=>'Manage LearningLevel','url'=>array('admin')),
);
?>

<h1>Learning Levels</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>