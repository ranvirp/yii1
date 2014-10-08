<?php
/* @var $this CitizenRuralController */
/* @var $model CitizenRural */

$this->breadcrumbs=array(
	'Citizen Rurals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CitizenRural', 'url'=>array('index')),
	array('label'=>'Create CitizenRural', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#citizen-rural-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Citizen Rurals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'citizen-rural-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name_en',
		'name_hi',
		'father_name_en',
		'spouse_name_en',
		'father_name_hi',
		/*
		'spouse_name_hi',
		'revenue_village_code',
		'address',
		'mobile1',
		'mobile2',
		'photo',
		'gender',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
