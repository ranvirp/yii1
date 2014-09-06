<?php
/* @var $this SkillLevelCategoryController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Skill Level Categories',
);

$this->menu=array(
	array('label'=>'Create SkillLevelCategory','url'=>array('create')),
	array('label'=>'Manage SkillLevelCategory','url'=>array('admin')),
);
?>

<h1>Skill Level Categories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>