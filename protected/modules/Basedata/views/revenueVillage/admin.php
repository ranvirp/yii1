<?php
/* @var $this RevenueVillageController */
/* @var $model RevenueVillage */


$this->breadcrumbs=array(
	'Revenue Villages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RevenueVillage', 'url'=>array('index')),
	array('label'=>'Create RevenueVillage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#revenue-village-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<?php $lang=Yii::app()->language;?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'revenue-village-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type' => TbHtml::GRID_TYPE_BORDERED,
	'columns'=>array(
		array(
		'name'=>'tehsil_code',
		'header'=>Yii::t('app','Tehsil'),
		'filter'=>Tehsil::model()->listAll(),
		 'value'=>'$data->tehsilCode->name_'.$lang,
		),
		'code',
		
		'name_en',
		'name_hi',
		'panchayat_code',
		'census_code',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>