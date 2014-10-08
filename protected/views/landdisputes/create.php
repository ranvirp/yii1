<?php
/* @var $this LanddisputesController */
/* @var $model Landdisputes */
?>

<?php
$this->breadcrumbs=array(
	'Landdisputes'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Landdisputes Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model,'complainants'=>$complainants,  'oppositions'=>$oppositions)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  Landdisputes', 'url'=>array('index')),
	array('label'=>'Manage  Landdisputes', 'url'=>array('admin')),
);
?>   