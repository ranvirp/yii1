<?php
/* @var $this RevenueVillageController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Revenue Villages',
);

$this->menu=array(
	array('label'=>'Create RevenueVillage','url'=>array('create')),
	array('label'=>'Manage RevenueVillage','url'=>array('admin')),
);
?>

<h1>Revenue Villages</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>