<?php
/* @var $this CitizenRuralController */
/* @var $model CitizenRural */

$this->breadcrumbs=array(
	'Citizen Rurals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CitizenRural', 'url'=>array('index')),
	array('label'=>'Create CitizenRural', 'url'=>array('create')),
	array('label'=>'View CitizenRural', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CitizenRural', 'url'=>array('admin')),
);
?>

<h1>Update CitizenRural <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>