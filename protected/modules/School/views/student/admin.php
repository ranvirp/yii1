<?php
/* @var $this StudentController */
/* @var $model Student */


$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Students</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $lang=Yii::app()->language;?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		array(
			'name'=>'photo',
		'class'=>'ext.AttachmentBehavior.EImageColumn'	
		),
			array(
				'name'=>'school_id',
				'header'=>'School',
				'value'=>'$data->school->name_'.$lang,
				),
		'class',
		array(
		'header'=>'Name',
			'value'=>'$data->name_'.$lang,
			),
		'date_of_birth',
		
		/*
		'age',
		'photo',
		'rollno',
		'section',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>