<?php
/* @var $this LanddisputesController */
/* @var $model Landdisputes */
?>

<?php
$this->breadcrumbs=array(
	'Landdisputes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Landdisputes', 'url'=>array('index')),
	array('label'=>'Create Landdisputes', 'url'=>array('create')),
	array('label'=>'View Landdisputes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Landdisputes', 'url'=>array('admin')),
);
?>

    <h1>Update Landdisputes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>