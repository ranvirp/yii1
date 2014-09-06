<?php
/* @var $this DesignationUserController */
/* @var $model DesignationUser */
?>

<?php
$this->breadcrumbs=array(
	'Designation Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DesignationUser', 'url'=>array('index')),
	array('label'=>'Create DesignationUser', 'url'=>array('create')),
	array('label'=>'View DesignationUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DesignationUser', 'url'=>array('admin')),
);
?>

    <h1>Update DesignationUser <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>