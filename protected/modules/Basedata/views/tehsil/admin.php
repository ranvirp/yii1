<?php
/* @var $this TehsilController */
/* @var $model Tehsil */


$this->breadcrumbs=array(
	'Tehsils'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tehsil', 'url'=>array('index')),
	array('label'=>'Create Tehsil', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tehsil-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tehsil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'code',
		'district_code',
		'name_en',
		'name_hi',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>