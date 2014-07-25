<?php
/* @var $this DistrictController */
/* @var $model District */
?>
<style>
    .bootstrap-widget-header h3
{
    color: white;
}
</style>
<?php
$this->breadcrumbs=array(
	'Districts'=>array('index'),
	'Create',
);?>
  <?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Districts Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table'),
 'htmlHeaderOptions'=>array('class'=>'btn-danger'),
));?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?> <?php $this->endWidget();?><?php
$this->menu=array(
	array('label'=>'List  District', 'url'=>array('index')),
	array('label'=>'Manage  District', 'url'=>array('admin')),
);
?>   