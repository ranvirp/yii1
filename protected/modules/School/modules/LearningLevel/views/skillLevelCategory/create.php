<?php
/* @var $this SkillLevelCategoryController */
/* @var $model SkillLevelCategory */
?>

<?php
$this->breadcrumbs=array(
	'Skill Level Categories'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Skill Level Categories Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  SkillLevelCategory', 'url'=>array('index')),
	array('label'=>'Manage  SkillLevelCategory', 'url'=>array('admin')),
);
?>   