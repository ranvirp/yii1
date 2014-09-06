<?php
/* @var $this SubjectController */
/* @var $model Subject */
?>

<?php
$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	$model->code=>array('view','id'=>$model->code),
	'Update',
);

$this->menu=array(
	array('label'=>'List Subject', 'url'=>array('index')),
	array('label'=>'Create Subject', 'url'=>array('create')),
	array('label'=>'View Subject', 'url'=>array('view', 'id'=>$model->code)),
	array('label'=>'Manage Subject', 'url'=>array('admin')),
);
?>

    <h1>Update Subject <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>