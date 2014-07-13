<?php $items = array(
	array(
		'url' => 'https://farm8.staticflickr.com/7363/9299212246_b9e6036734_o.jpg',
		
		'src' => 'https://farm8.staticflickr.com/7363/9299212246_b9e6036734_o.jpg',
		'options' => array('title' => 'Selva with Me')
	),
	array(
		'url' => 'https://farm6.staticflickr.com/5480/9299214108_44959a93f8_o.jpg',
		'src' => 'https://farm6.staticflickr.com/5480/9299214108_44959a93f8_o.jpg',
		'options' => array('title' => 'Selva with Flower')
	),
	
);?>
<div class="row-fluid">
<div class="span7">
<?php $this->widget('yiiwheels.widgets.gallery.WhCarousel', array('items' => $items));?>
</div>
<div class="span5">
<?php $this->widget('yiiwheels.widgets.box.WhBox',array(
                      'title'=>'Personal Profile',
					  'content'=>'

<div class="span7 ">
<div class="row-fluid">
<div class="span4">'.
TbHtml::b("Name").
'</div>
<div class="span8">
<p>Ridhima</p>
</div>
</div>

<div class="row-fluid">
<div class="span4">'.
TbHtml::b("Father''s Name")
.'</div>
<div class="span8">
<p>Ranvir Prasad</p>
</div>

</div>
<div class="row-fluid">
<div class="span4">'.
TbHtml::b("Mother's Name").
'</div>
<div class="span8">
<p>Selvakumari Jayarajan</p>
</div>
</div>
<div class="row-fluid">
<div class="span4">'.TbHtml::b("Date of Birth").
'</div>
<div class="span8">
<p>22nd December,2008</p>
</div>
</div>

</div>
<div class="span4">'.
TbHtml::imageRounded(Yii::app()->request->baseUrl.'/images/download1.jpg').
'</div>
',
));?>
<?php $this->widget('yiiwheels.widgets.box.WhBox',array(
                      'title'=>'Health Profile',
					  'content'=>'

<div class="span12 ">
<div class="row-fluid">
<div class="span4">'.
TbHtml::b("Height").
'</div>
<div class="span8">
<p>3 ft. 2 inches</p>
</div>
</div>

<div class="row-fluid">
<div class="span4">'.
TbHtml::b("Weight")
.'</div>
<div class="span8">
<p>20 Kg</p>
</div>

</div>
<div class="row-fluid">
<div class="span4">'.
TbHtml::b("Blood Group").
'</div>
<div class="span8">
<p>O+</p>
</div>
</div>



',
));?>

</div>
</div>
<div class="row-fluid">
<div class="span12">
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' => 'Performance in Subjects',
    'display' => null, // default is static to top
    'items' => array(
        
    ),
)); ?>
</div>
</div>
<div class="row-fluid">
<div class="span6">
<?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'English',
    'headerIcon' => 'icon-th-list',
    // when displaying a table, if we include bootstra-widget-table class
    // the table will be 0-padding to the box
    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<tr>
<td><h3>Reading Speed</h3></td>
<td><?php echo TbHtml::stripedProgressBar(40); ?></td>
</tr>
<tr>
<td><h3>Writing Speed</h3></td>
<td><?php echo TbHtml::stripedProgressBar(20); ?></td>
</tr>
<tr>
<td><h3>Vocabulary</h3></td>
<td><table class="table striped">
<tr><td>Vegetables</td><td>5</td></tr>
<tr><td>Fruits</td><td>5</td></tr>
<tr><td>Animals</td><td>5</td></tr>
</table></td>
</tr>
</table>
<?php $this->endWidget();?>
</div>
<div class="span6">
<?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Hindi',
    'headerIcon' => 'icon-th-list',
    // when displaying a table, if we include bootstra-widget-table class
    // the table will be 0-padding to the box
    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>
<table class="table">
<tr>
<td><h3>Reading Speed</h3></td>
<td><?php echo TbHtml::stripedProgressBar(40); ?></td>
</tr>
<tr>
<td><h3>Writing Speed</h3></td>
<td><?php echo TbHtml::stripedProgressBar(20); ?></td>
</tr>
<tr>
<td><h3>Vocabulary</h3></td>
<td><table class="table striped">
<tr><td>Vegetables</td><td>5</td></tr>
<tr><td>Fruits</td><td>5</td></tr>
<tr><td>Animals</td><td>5</td></tr>
</table></td>
</tr>
</table>
<?php $this->endWidget();?>
</div>
</div>

