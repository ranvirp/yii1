<?php
/* @var $this LevelController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Levels',
);

$this->menu=array(
	array('label'=>'Create Level','url'=>array('create')),
	array('label'=>'Manage Level','url'=>array('admin')),
);
?>

<h1>Levels</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>