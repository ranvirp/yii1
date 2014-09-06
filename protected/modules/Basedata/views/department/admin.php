<?php
/* @var $this DepartmentController */
/* @var $model Department */


$this->breadcrumbs=array(
	'Departments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Department', 'url'=>array('index')),
	array('label'=>'Create Department', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#department-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'department-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'name_hi',
		'code',
		'name_en',
		array(
		'name'=>'state_code',
			'value'=>'$data->stateCode->name_en',
			),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>