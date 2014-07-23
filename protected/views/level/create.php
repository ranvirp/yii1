<?php
/* @var $this LevelController */
/* @var $model Level */
?>

<?php
$this->breadcrumbs=array(
	'Levels'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Levels Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  Level', 'url'=>array('index')),
	array('label'=>'Manage  Level', 'url'=>array('admin')),
);
?>   