<?php
/* @var $this SkillLevelController */
/* @var $model SkillLevel */
?>

<?php
$this->breadcrumbs=array(
	'Skill Levels'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Skill Levels Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  SkillLevel', 'url'=>array('index')),
	array('label'=>'Manage  SkillLevel', 'url'=>array('admin')),
);
?>   