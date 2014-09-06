<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!--<div class="container-fluid fill">-->
    <div class="row-fluid">
         <div class="span8">
                <?php echo $content; ?>
            </div><!-- content -->
        <div class="span4">
           
            <?php
            $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
                'title' => 'Operations',
            ));
            $this->widget('bootstrap.widgets.TbNav', array(
                'type' => TbHtml::NAV_TYPE_LIST,
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->
        
           
        
    </div>
<!--</div>-->
<?php $this->endContent(); ?>
