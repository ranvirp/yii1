<?php
/* @var $this SkillLevelCategoryController */
/* @var $model SkillLevelCategory */
?>

<?php
$this->breadcrumbs=array(
	'Skill Level Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SkillLevelCategory', 'url'=>array('index')),
	array('label'=>'Create SkillLevelCategory', 'url'=>array('create')),
	array('label'=>'Update SkillLevelCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SkillLevelCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SkillLevelCategory', 'url'=>array('admin')),
);
?>

<h1>View SkillLevelCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name_hi',
		'name_en',
		'subject_code',
	),
)); ?>