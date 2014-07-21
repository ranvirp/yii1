<?php
/* @var $this PanchayatController */
/* @var $model Panchayat */
?>

<?php
$this->breadcrumbs=array(
	'Panchayats'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List Panchayat', 'url'=>array('index')),
	array('label'=>'Create Panchayat', 'url'=>array('create')),
	array('label'=>'View Panchayat', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage Panchayat', 'url'=>array('admin')),
);
?>

    <h1>Update Panchayat <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>