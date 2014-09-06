<?php
/* @var $this RevenueVillageController */
/* @var $model RevenueVillage */
?>

<?php
$this->breadcrumbs=array(
	'Revenue Villages'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List RevenueVillage', 'url'=>array('index')),
	array('label'=>'Create RevenueVillage', 'url'=>array('create')),
	array('label'=>'View RevenueVillage', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage RevenueVillage', 'url'=>array('admin')),
);
?>

    <h1>Update RevenueVillage <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>