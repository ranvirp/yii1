<?php
/* @var $this SkillLevelController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Skill Levels',
);

$this->menu=array(
	array('label'=>'Create SkillLevel','url'=>array('create')),
	array('label'=>'Manage SkillLevel','url'=>array('admin')),
);
?>

<h1>Skill Levels</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>