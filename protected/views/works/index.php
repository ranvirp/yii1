<?php
/* @var $this WorksController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Works',
);

$this->menu=array(
	array('label'=>'Create Works','url'=>array('create')),
	array('label'=>'Manage Works','url'=>array('admin')),
);
?>

<h1>Works</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>