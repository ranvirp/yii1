<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>

<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);?>\n";

 echo "  <?php \$box = \$this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => '$label Form',
'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>";

?>



<?php echo "<?php \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
 <?php echo "<?php \$this->endWidget();?>" ;
echo "<?php
\$this->menu=array(
	array('label'=>'List  $this->modelClass', 'url'=>array('index')),
	array('label'=>'Manage  $this->modelClass', 'url'=>array('admin')),
);
?>";
 ?>
   