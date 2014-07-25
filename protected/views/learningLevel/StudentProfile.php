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
    <?php
     $name='name_'.$lang;
     $fathersname='fathersname_'.$lang;
     $mothersname='mothersname_'.$lang;
    ?>
<?php $this->widget('yiiwheels.widgets.box.WhBox',array(
                      'title'=>'Personal Profile',
					  'content'=>'

<div class="span7 ">
<div class="row-fluid">
<div class="span4">'.
TbHtml::b(Yii::t('app',"Name")).
'</div>
<div class="span8">
<p>'.$student->$name.'</p>
</div>
</div>

<div class="row-fluid">
<div class="span4">'.
TbHtml::b(Yii::t('app',"Father's Name"))
.'</div>
<div class="span8">
<p>'.$student->$fathersname.'</p>
</div>

</div>
<div class="row-fluid">
<div class="span4">'.
TbHtml::b(Yii::t('app',"Mother's Name")).
'</div>
<div class="span8">
<p>'.$student->$mothersname.'</p>
</div>
</div>
<div class="row-fluid">
<div class="span4">'.TbHtml::b(Yii::t('app',"Date of Birth")).
'</div>
<div class="span8">
<p>'."$student->date_of_birth".'</p>
</div>
</div>

</div>
<div class="span4">'.
TbHtml::imageRounded(Yii::app()->request->baseUrl.'/images/download1.jpg').
'</div>
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
 <?php
    foreach($arrayOfLL as $subject=>$subjectLL)
{

    $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => $subject,
    'headerIcon' => 'icon-th-list',
    // when displaying a table, if we include bootstra-widget-table class
    // the table will be 0-padding to the box
    'htmlOptions' => array('class'=>'bootstrap-widget-table')
));
        
    
     foreach ($subjectLL as $level=>$array)
     {
         
         $prevcategory='';
         foreach ($array as $x)
         {
             
            if ($x['category']!=$prevcategory)
            {
                echo "<div class='well'>".'<h5>'.$x['category'].'</h5>'.'</div>';
            }
             echo "<div class='row-fluid'><div class='span1'>$level</div><div class='span3'>".$x['name']."</div>";
             echo "<div class='span2'>".$x['value'].'</div>';
             
             
             $color='danger';
             $width=100;
             $unit='';
             if ($x['unit']==='yn')
             {
                 $color='success';
                 $width=100;
                 $unit='';
             }
             if ($x['unit']==='percentange')
             {
                 if ($x['value']==100)
                     $color='success';
                 $width=$x['value'];
                 $unit ='%';
             } 
             if ($x['unit']==='number')
             {
                 if ($x['value']>=$x['required_value'])
                     $color='success';
                 $width=$x['value']/$x['required_value']*100;
             } 
             echo "<div class='span1'>$unit</div>";
             echo "<div class='span4'>";
             $color= 'PROGRESS_COLOR_'.  strtoupper($color);
             echo TbHtml::stripedProgressBar($width.'%', array('color'=>'red'));
             echo "</div></div>";
            }
            }
       $this->endWidget(); 
     }
    ?>


