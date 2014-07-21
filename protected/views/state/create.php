<?php
/* @var $this StateController */
/* @var $model State */
?>

<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List State', 'url'=>array('index')),
	array('label'=>'Manage State', 'url'=>array('admin')),
);
?>

<h1>Create State</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>