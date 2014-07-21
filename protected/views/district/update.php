<?php
/* @var $this DistrictController */
/* @var $model District */
?>

<?php
$this->breadcrumbs=array(
	'Districts'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List District', 'url'=>array('index')),
	array('label'=>'Create District', 'url'=>array('create')),
	array('label'=>'View District', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage District', 'url'=>array('admin')),
);
?>

    <h1>Update District <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>