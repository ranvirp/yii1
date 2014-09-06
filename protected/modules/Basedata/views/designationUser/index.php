<?php
/* @var $this DesignationUserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Designation Users',
);

$this->menu=array(
	array('label'=>'Create DesignationUser','url'=>array('create')),
	array('label'=>'Manage DesignationUser','url'=>array('admin')),
);
?>

<h1>Designation Users</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>