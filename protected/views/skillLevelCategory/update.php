<?php
/* @var $this SkillLevelCategoryController */
/* @var $model SkillLevelCategory */
?>

<?php
$this->breadcrumbs=array(
	'Skill Level Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SkillLevelCategory', 'url'=>array('index')),
	array('label'=>'Create SkillLevelCategory', 'url'=>array('create')),
	array('label'=>'View SkillLevelCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SkillLevelCategory', 'url'=>array('admin')),
);
?>

    <h1>Update SkillLevelCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>