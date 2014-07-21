<?php
/* @var $this StateController */
/* @var $model State */
?>

<?php
$this->breadcrumbs=array(
	'States'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List State', 'url'=>array('index')),
	array('label'=>'Create State', 'url'=>array('create')),
	array('label'=>'View State', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage State', 'url'=>array('admin')),
);
?>

    <h1>Update State <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>