<?php
/* @var $this SchoolEnrollmentController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'School Enrollments',
);

$this->menu=array(
	array('label'=>'Create SchoolEnrollment','url'=>array('create')),
	array('label'=>'Manage SchoolEnrollment','url'=>array('admin')),
);
?>

<h1>School Enrollments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>