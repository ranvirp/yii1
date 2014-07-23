<?php
/* @var $this DesignationController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Designations',
);

$this->menu=array(
	array('label'=>'Create Designation','url'=>array('create')),
	array('label'=>'Manage Designation','url'=>array('admin')),
);
?>

<h1>Designations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>