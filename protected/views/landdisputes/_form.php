<?php
/* @var $this LanddisputesController */
/* @var $model Landdisputes */
/* @var $form TbActiveForm */
?>
  
<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'landdisputes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        //'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php $lang=Yii::app()->language;?>
    <?php echo $form->errorSummary($model); ?>
   

  <ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#complainanttab" role="tab" data-toggle="tab">Complainants</a></li>
  <li ><a href="#oppositiontab" role="tab" data-toggle="tab">Oppositions</a></li>
  <li ><a href="#landdetailstab" role="tab" data-toggle="tab">Land Details</a></li>
  <li ><a href="#detailstab" role="tab" data-toggle="tab">Details</a></li>
  <li ><a href="#courtcasestab" role="tab" data-toggle="tab">Court Cases</a></li>
 
  </ul>
 <div class="tab-content">
  <div class="tab-pane active" id="complainanttab"> 
      <div class="row">
          <div class="container">
        
      <?php foreach ($complainants as $i=>$complainant):?>
          
        <div class="row">
              <div class="col-md-2"><?php echo Yii::t('app','Name');?></div>
            <div class="col-md-2"><?php echo $form->textField($complainant,'[$i]name_'.$lang);?></div>
        </div>
              <div class="row">
              <div class="col-md-2"><?php echo Yii::t('app',"Father's Name");?></div>
           <div class="col-md-2"><?php echo $form->textField($complainant,'[$i]father_name_'.$lang);?><br/>
           <?php echo Yii::t('app',"Spouse's Name").'<br/>'; echo $form->textField($complainant,'[$i]spouse_name_'.$lang);?></div>
              </div>
              <div class="row">
              <div class="col-md-2"><?php echo Yii::t('app',"Address");?></div>
              <div class="col-md-2"><?php echo $form->textArea($complainant,'[$i]address');?></div>
              </div>
              <div class="row">
             <div class="col-md-2"><?php echo Yii::t('app',"mobile1");?></div> 
           <div class="col-md-2"><?php echo $form->textField($complainant,'[$i]mobile1');?></div>
              </div>
              <div class="row">
             <div class="col-md-2"><?php echo Yii::t('app',"mobile2");?></div>
            <div class="col-md-2"><?php echo $form->textField($complainant,'[$i]mobile2');?></div>
              </div>
        </div>
        <?php endforeach;?>
    </div>
          
      </div>
 
    
     <div class="tab-pane " id="oppositiontab">
        <div class="container">
        
      <?php foreach ($oppositions as $i=>$opposition):?>
          
        <div class="row">
              <div class="col-md-2"><?php echo Yii::t('app','Name');?></div>
            <div class="col-md-2"><?php echo $form->textField($opposition,'[$i]name_'.$lang);?></div>
        </div>
              <div class="row">
              <div class="col-md-2"><?php echo Yii::t('app',"Father's Name");?></div>
           <div class="col-md-2"><?php echo $form->textField($opposition,'[$i]father_name_'.$lang);?><br/>
           <?php echo Yii::t('app',"Spouse's Name").'<br/>'; echo $form->textField($opposition,'[$i]spouse_name_'.$lang);?></div>
              </div>
              <div class="row">
              <div class="col-md-2"><?php echo Yii::t('app',"Address");?></div>
              <div class="col-md-2"><?php echo $form->textArea($opposition,'[$i]address');?></div>
              </div>
              <div class="row">
             <div class="col-md-2"><?php echo Yii::t('app',"mobile1");?></div> 
           <div class="col-md-2"><?php echo $form->textField($opposition,'[$i]mobile1');?></div>
              </div>
              <div class="row">
             <div class="col-md-2"><?php echo Yii::t('app',"mobile2");?></div>
            <div class="col-md-2"><?php echo $form->textField($opposition,'[$i]mobile2');?></div>
              </div>
            <?php endforeach;?>
        </div>
         
     </div>
    <div class="tab-pane" id="landdetailstab">
    	 
<div class="row">
        <?php  $this->widget('RevenueVillageWidget',array('model'=>$model,'attribute'=>'revenuevillage'));?>    
</div>  	 
            <?php echo $form->textFieldControlGroup($model,'policestation',array('span'=>5,'maxlength'=>11)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'gatanos',array('span'=>5,'maxlength'=>220)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'category',array('span'=>5,'maxlength'=>11)); ?>

    </div>
<div class="tab-pane" id="detailstab">
     
    	 <?php echo $form->textFieldControlGroup($model,'description',array('span'=>5,'maxlength'=>200)); ?>
<?php echo $form->textFieldControlGroup($model,'policerequired',array('span'=>5,'maxlength'=>4)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'nextdateofaction',array('span'=>5,'maxlength'=>200)); ?>
</div>
     <div class="tab-pane" id="courtcasestab">
    
    	 <?php echo $form->textFieldControlGroup($model,'disputependingfor',array('span'=>5,'maxlength'=>6)); ?>
    
    	 <?php echo $form->textFieldControlGroup($model,'courtcasepending',array('span'=>5,'maxlength'=>4)); ?>

    
    	 <?php echo $form->textFieldControlGroup($model,'courtcasedetails',array('span'=>5,'maxlength'=>1000)); ?>

    
    	 

    
    	 <?php echo $form->textFieldControlGroup($model,'casteorcommunal',array('span'=>5,'maxlength'=>11)); ?>
</div>
 </div>
    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
