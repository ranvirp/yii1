<?php
/* @var $this DesignationTypeController */
/* @var $model DesignationType */


$this->breadcrumbs=array(
	'Designation Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DesignationType', 'url'=>array('index')),
	array('label'=>'Create DesignationType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#designation-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $lang=Yii::app()->language;?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'designation-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'name_hi',
		'name_en',
		'code',
		array(
		'name'=>'department_id',
	    'value'=>'$data->department->name_'.$lang,
			),
		
		array(
			'name'=>'level_id',
			 'value'=>'$data->level->name_'.$lang,
			),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>