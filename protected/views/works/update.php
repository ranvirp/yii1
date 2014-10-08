<?php
/* @var $this WorksController */
/* @var $model Works */
?>

<?php
$this->breadcrumbs=array(
	'Works'=>array('index'),
	$model->title=>array('view','id'=>$model->bwid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Works', 'url'=>array('index')),
	array('label'=>'Create Works', 'url'=>array('create')),
	array('label'=>'View Works', 'url'=>array('view', 'id'=>$model->bwid)),
	array('label'=>'Manage Works', 'url'=>array('admin')),
);
?>

    <h1>Update Works <?php echo $model->bwid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>