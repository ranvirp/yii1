<?php
/* @var $this DesignationUserController */
/* @var $model DesignationUser */
?>

<?php
$this->breadcrumbs=array(
	'Designation Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DesignationUser', 'url'=>array('index')),
	array('label'=>'Create DesignationUser', 'url'=>array('create')),
	array('label'=>'Update DesignationUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DesignationUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DesignationUser', 'url'=>array('admin')),
);
?>

<h1>View DesignationUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'designation_id',
		'user_id',
	),
)); ?>