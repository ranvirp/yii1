<?php
/* @var $this PwdUnitController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Pwd Units',
);

$this->menu=array(
	array('label'=>'Create PwdUnit','url'=>array('create')),
	array('label'=>'Manage PwdUnit','url'=>array('admin')),
);
?>

<h1>Pwd Units</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>