<?php
/* @var $this PhotosController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Photoses',
);

$this->menu=array(
	array('label'=>'Create Photos','url'=>array('create')),
	array('label'=>'Manage Photos','url'=>array('admin')),
);
?>

<h1>Photoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>