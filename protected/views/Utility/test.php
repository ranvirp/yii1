<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// A Logo 
?>
<style>
    .bootstrap-widget-header h3
{
    color: white;
    font-size:10px;
    line-height:10px;
}
.bootstrap-widget-header{
    height:35px;
}

.iconbox i {
    
    display: block;
    margin: 2px;
    text-align: center;
    
}

.dashboard-link
{
    line-height:100px;
    display:block;
}
.icon-text {
    display: block;
    
    line-height: 120%;
    margin: 2px;
    text-align: center;
    width: 100%;
}
</style>
<div class="row-fluid">
    <div class="span2"></div>
<div class="span6">
<div class="row-fluid">
    <div class="span3">
    <div class="iconbox well">
        <a class="dashboard-link">
            <i class="fa fa-camera-retro fa-4x"></i>
        <span class="icon-text">Photos</span>
        </a>
        
        
    </div>
    </div>
     <div class="span3">
    <div class="iconbox well">
        <a class="dashboard-link">
            <i class="fa fa-bell fa-4x"></i>
        <span class="icon-text">Alarm</span>
        </a>
        
        
    </div>
    </div>
     <div class="span3">
    <div class="iconbox well">
        <a class="dashboard-link">
            <i class="fa fa-ambulance fa-4x"></i>
        <span class="icon-text">Hospital</span>
        </a>
        
        
    </div>
    </div>
     <div class="span3">
    <div class="iconbox well">
        <a class="dashboard-link">
            <i class="fa fa-book fa-4x"></i>
        <span class="icon-text">Books</span>
        </a>
        
        
    </div>
    </div>
</div>
</div>
<div class="span4">
<?php $box = $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
'title' => 'Districts',
//'headerIcon' => 'icon-th-list',
// when displaying a table, if we include bootstra-widget-table class
// the table will be 0-padding to the box
'htmlOptions' => array('class'=>'bootstrap-widget-table'),
 'htmlHeaderOptions'=>array('class'=>'btn-danger'),
));?>
<ul>
    <li><a href="<?php echo $this->createUrl('district/manage')?>">Manage Districts </a></li>
    <li><a href="<?php echo $this->createUrl('district/manage')?>">Manage District </a></li>
    <li><a href="<?php echo $this->createUrl('district/manage')?>">Manage District </a></li>
</ul>
<?php $this->endWidget();?>
</div>
</div>