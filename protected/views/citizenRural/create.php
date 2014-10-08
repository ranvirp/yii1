<?php
/* @var $this CitizenRuralController */
/* @var $model CitizenRural */

$this->breadcrumbs=array(
	'Citizen Rurals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CitizenRural', 'url'=>array('index')),
	array('label'=>'Manage CitizenRural', 'url'=>array('admin')),
);
?>

<h1>Create CitizenRural</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>