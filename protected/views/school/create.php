<?php
/* @var $this SchoolController */
/* @var $model School */
?>

<?php
$this->breadcrumbs=array(
	'Schools'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Schools Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  School', 'url'=>array('index')),
	array('label'=>'Manage  School', 'url'=>array('admin')),
);
?>   