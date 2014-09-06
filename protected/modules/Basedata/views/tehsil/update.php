<?php
/* @var $this TehsilController */
/* @var $model Tehsil */
?>

<?php
$this->breadcrumbs=array(
	'Tehsils'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tehsil', 'url'=>array('index')),
	array('label'=>'Create Tehsil', 'url'=>array('create')),
	array('label'=>'View Tehsil', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage Tehsil', 'url'=>array('admin')),
);
?>

    <h1>Update Tehsil <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>