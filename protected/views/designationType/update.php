<?php
/* @var $this DesignationTypeController */
/* @var $model DesignationType */
?>

<?php
$this->breadcrumbs=array(
	'Designation Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DesignationType', 'url'=>array('index')),
	array('label'=>'Create DesignationType', 'url'=>array('create')),
	array('label'=>'View DesignationType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DesignationType', 'url'=>array('admin')),
);
?>

    <h1>Update DesignationType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>