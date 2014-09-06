<?php
/* @var $this TehsilController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Tehsils',
);

$this->menu=array(
	array('label'=>'Create Tehsil','url'=>array('create')),
	array('label'=>'Manage Tehsil','url'=>array('admin')),
);
?>

<h1>Tehsils</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>