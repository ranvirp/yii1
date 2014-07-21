<?php
/* @var $this SkillLevelController */
/* @var $model SkillLevel */
?>

<?php
$this->breadcrumbs=array(
	'Skill Levels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SkillLevel', 'url'=>array('index')),
	array('label'=>'Create SkillLevel', 'url'=>array('create')),
	array('label'=>'View SkillLevel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SkillLevel', 'url'=>array('admin')),
);
?>

    <h1>Update SkillLevel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>