<?php
/* @var $this CitizenRuralController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Citizen Rurals',
);

$this->menu=array(
	array('label'=>'Create CitizenRural', 'url'=>array('create')),
	array('label'=>'Manage CitizenRural', 'url'=>array('admin')),
);
?>

<h1>Citizen Rurals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
