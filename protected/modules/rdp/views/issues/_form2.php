<div class="row">
  <div class="col-md-12">
	  <?php $x=""; $activeForm=$this->widget("bootstrap.widgets.TbActiveForm",array('layout'=>'','helpType'=>'block','errorMessageCssClass'=>'error','successMessageCssClass'=>'success','labelCssClass'=>'col-md-2','controlGroupCssClass'=>'col-md-10','hideInlineErrors'=>1,'action'=>'','method'=>'post','stateful'=>'','htmlOptions'=>'','clientOptions'=>'','enableAjaxValidation'=>0,'enableClientValidation'=>'','focus'=>'','actionPrefix'=>'','skin'=>'default'));?></div>
 <?php $x.=$this->widget("bootstrap.widgets.TbActiveForm",array('layout'=>'','helpType'=>'block','errorMessageCssClass'=>'error','successMessageCssClass'=>'success','labelCssClass'=>'col-md-2','controlGroupCssClass'=>'col-md-10','hideInlineErrors'=>1,'action'=>'','method'=>'post','stateful'=>'','htmlOptions'=>'','clientOptions'=>'','enableAjaxValidation'=>0,'enableClientValidation'=>'','focus'=>'','actionPrefix'=>'','skin'=>'default'),TRUE);?>
 <?php $x.= $activeForm->dropDownListControlGroup($model,'schemeid',Schemes::model()->listAllAsArray('Schemes'),array());?>
    <?php
    $x.= TbHtml::dropDownList( 'designation_type', 'CDO', Schemes::model()->listAllAsArray('Designation_types'),
		array_merge(array(),
		array(
			'onChange'=>
			"$.post('".Yii::app()->createUrl('issues/getLevelDetails')."', 
				{'designation_type':$(this).val()},
			function(data){\$('#Issues_to').html(data)})")));
			?>
	  
        <?php
        $x.= $activeForm->dropDownListControlGroup($model,'to',array(),array());?>
          
          <?php $x.= TbHtml::submitButton( 'Submit',array());?>
	 <?php echo $x;?>
	  <?php echo TbHtml::imageButton(
          'http://hdwallpaper2013.com/wp-content/themes/gambar/scripts/timthumb.php?src=http://hdwallpaper2013.com/wp-content/uploads/2013/02/Download-Rose-Flower-Background-HD-Wallpaper.jpg&w=180&h=150&zc=2&q=90',array());?>
  
			  <?php $gridView=$this->beginWidget("bootstrap.widgets.TbGridView", array('dataProvider'=>Schemes::model()->search()));?>
	  <?php
	   
	  ?>
          <?php $this->endWidget();?>
	
  </div>

	  
  
 
 