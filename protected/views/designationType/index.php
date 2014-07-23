<?php
/* @var $this DesignationTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Designation Types',
);

$this->menu=array(
	array('label'=>'Create DesignationType','url'=>array('create')),
	array('label'=>'Manage DesignationType','url'=>array('admin')),
);
?>

<h1>Designation Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>