<?php
/* @var $this PanchayatController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Panchayats',
);

$this->menu=array(
	array('label'=>'Create Panchayat','url'=>array('create')),
	array('label'=>'Manage Panchayat','url'=>array('admin')),
);
?>

<h1>Panchayats</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>