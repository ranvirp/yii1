<?php
/* @var $this StateController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'States',
);

$this->menu=array(
	array('label'=>'Create State','url'=>array('create')),
	array('label'=>'Manage State','url'=>array('admin')),
);
?>

<h1>States</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>