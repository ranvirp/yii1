<?php
/* @var $this BlockController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Blocks',
);

$this->menu=array(
	array('label'=>'Create Block','url'=>array('create')),
	array('label'=>'Manage Block','url'=>array('admin')),
);
?>

<h1>Blocks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>