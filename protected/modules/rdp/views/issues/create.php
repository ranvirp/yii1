<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'अनिस्तारित समस्याओं की सूची', 'url'=>array('index')),
	array('label'=>'निस्तारित समस्याओं की सूची', 'url'=>array('admin')),
);
?>


 <?php $panel=$this->beginWidget("yiiwheels.widgets.box.WhBox",array('htmlOptions'=>array (),'title'=>'
    अपनी समस्या दर्ज कराएं'));?>
	<?php $this->renderPartial('_form', array('model'=>$model,'files'=>$files),false,TRUE); ?>

	<?php $this->endWidget();?>