<?php
/* @var $this SchoolEnrollmentController */
/* @var $model SchoolEnrollment */
?>

<?php
$this->breadcrumbs=array(
	'School Enrollments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SchoolEnrollment', 'url'=>array('index')),
	array('label'=>'Create SchoolEnrollment', 'url'=>array('create')),
	array('label'=>'View SchoolEnrollment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SchoolEnrollment', 'url'=>array('admin')),
);
?>

    <h1>Update SchoolEnrollment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>