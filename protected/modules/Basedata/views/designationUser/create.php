<?php
/* @var $this DesignationUserController */
/* @var $model DesignationUser */
?>

<?php
$this->breadcrumbs=array(
	'Designation Users'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Designation Users Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  DesignationUser', 'url'=>array('index')),
	array('label'=>'Manage  DesignationUser', 'url'=>array('admin')),
);
?>   