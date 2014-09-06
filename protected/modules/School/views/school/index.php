<?php
/* @var $this SchoolController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Schools',
);

$this->menu=array(
	array('label'=>'Create School','url'=>array('create')),
	array('label'=>'Manage School','url'=>array('admin')),
);
?>

<h1>Schools</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>