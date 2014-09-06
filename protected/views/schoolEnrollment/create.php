<?php
/* @var $this SchoolEnrollmentController */
/* @var $model SchoolEnrollment */
?>

<?php
$this->breadcrumbs=array(
	'School Enrollments'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'School Enrollments Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model,'post'=>$post,'errors'=>$errors)); ?> <?php $this->endWidget();?>
