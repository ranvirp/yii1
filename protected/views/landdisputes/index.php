<?php
/* @var $this LanddisputesController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Landdisputes',
);

$this->menu=array(
	array('label'=>'Create Landdisputes','url'=>array('create')),
	array('label'=>'Manage Landdisputes','url'=>array('admin')),
);
?>

<h1>Landdisputes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>