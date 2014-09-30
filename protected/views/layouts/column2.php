<?php /* @var $this Controller */ ?>
<?php $this->beginContent($this->layout); ?>
<div class="span-19">
	<div id="content">
		<?php 
                echo $content; 
                ?>
	</div><!-- content -->
</div>
<?php
$menu=array_merge($this->menu,array(
array('label'=>'Add User','url'=>array('/user')),
array('label'=>'Districts','url'=>array('/Basedata/district/create')),
array('label'=>'Tehsils','url'=>array('/Basedata/tehsil/create')),
array('label'=>'Blocks','url'=>array('/Basedata/block/create')),
array('label'=>'Revenue Village','url'=>array('/Basedata/revenueVillage/create')),  
array('label'=>'Department','url'=>array('/Basedata/department/create')),
array('label'=>'Add Designation Type','url'=>array('/Basedata/designationType/create')),
array('label'=>'Add Designation','url'=>array('/Basedata/designation/create')),
array('label'=>'Assign User to a Designation','url'=>array('/Basedata/designation/userAssign')),



));
?>
<div class="col-md-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>