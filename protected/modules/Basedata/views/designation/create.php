<?php
/* @var $this DesignationController */
/* @var $model Designation */
?>

<?php
$this->breadcrumbs=array(
	'Designations'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Designations Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  Designation', 'url'=>array('index')),
	array('label'=>'Manage  Designation', 'url'=>array('admin')),
);
?>   