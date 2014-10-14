<?php
/* @var $this PwdUnitController */
/* @var $model PwdUnit */
?>

<?php
$this->breadcrumbs=array(
	'Pwd Units'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List PwdUnit', 'url'=>array('index')),
	array('label'=>'Create PwdUnit', 'url'=>array('create')),
	array('label'=>'View PwdUnit', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage PwdUnit', 'url'=>array('admin')),
);
?>

    <h1>Update PwdUnit <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>