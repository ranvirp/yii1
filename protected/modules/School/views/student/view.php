<?php
/* @var $this StudentController */
/* @var $model Student */
?>

<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Update Student', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>View Student #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'school_id',
		'class',
		'name_hi',
		'name_en',
		'date_of_birth',
		'age',
		array(
		'name'=>'photo',
			'value'=>"CHtml::image(Yii::app()->createUrl('/utility/'.$data->getAttachment('thumb')),'',null)",
			),
		'rollno',
		'section',
	),
)); ?>