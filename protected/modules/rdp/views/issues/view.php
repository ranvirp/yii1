<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'समस्या सूची ', 'url'=>array('index')),
	array('label'=>'समस्या दर्ज करें', 'url'=>array('create')),
	array('label'=>'समस्या अद्यतन करें ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'समस्या मिटा दें', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'क्या आप इस प्रविष्टि को मिटाना चाहते हैं ??')),
	array('label'=>'समस्या प्रबंधन', 'url'=>array('admin')),
);
?>

<h1>समस्या # <?php echo $model->id?></h1>

<?php 

$lang=Yii::app()->language;
$name='name'.'_'.$lang;
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
		'label'=>'योजना',
		'type'=>'html',
		'value'=>$model->scheme->name,
		),
		array(
		'label'=>'प्रेषक:',
		'value'=>$model->froms->designationType->$name.",".$model->froms->designationType->level->$name.','.$model->froms->level_type_id->$name,
		),
		array(
		'label'=>'किसको संदर्भित है',
		'value'=>$model->tos->designationType->$name.",".$model->tos->designationType->level->$name.','.$model->tos->level_type_id->$name,
		),
		
		array(
		'name'=>'description',
		'label'=>'विवरण ',
		),
		
	),
));
echo $this->renderPartial('_replies',array(
			'replies'=>$model->replies,
		),true); 
	 
echo CHtml::ajaxButton('उत्तर दर्ज करें',Ccontroller::createUrl('/replies/create',array('content_type'=>'issues','content_type_id'=>$model->id)),array('dataType'=>'json',
	'success'=>"function(data){
	$('#commentdiv').html(data.html);
	}"));
echo CHtml::ajaxButton('Attach files', Yii::app()->createUrl('/Basedata/files/attach',array('modelName'=>get_class($model),'modelId'=>$model->id)),array('dataType'=>'json','success'=>"function(data){
	$('#".get_class($model)."_attachments').html(data.html);}"));

	
?>
<div id="commentdiv"></div>
