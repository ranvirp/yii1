<?php
/* @var $this BlockController */
/* @var $model Block */


$this->breadcrumbs=array(
	'Blocks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Block', 'url'=>array('index')),
	array('label'=>'Create Block', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#block-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $lang=Yii::app()->language;?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'block-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		'name'=>'district_code',
		'value'=>'$data->districtCode->name_'.$lang,
			),
		'code',
		
		'name_en',
		'name_hi',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>