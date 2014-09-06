<?php
/* @var $this SchoolEnrollmentController */
/* @var $model SchoolEnrollment */
?>

<?php
$this->breadcrumbs=array(
	'School Enrollments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SchoolEnrollment', 'url'=>array('index')),
	array('label'=>'Create SchoolEnrollment', 'url'=>array('create')),
	array('label'=>'Update SchoolEnrollment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SchoolEnrollment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SchoolEnrollment', 'url'=>array('admin')),
);
?>

<h1>View SchoolEnrollment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'school_code',
		'class',
		'male',
		'female',
		'total',
		'created_time',
		'created_user',
	),
)); ?>