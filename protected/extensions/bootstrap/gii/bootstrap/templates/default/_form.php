<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form TbActiveForm */
<?php echo "?>\n"; ?>

<div class="form">

    <?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>\n"; ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
   
<?php foreach ($this->tableSchema->columns as $column): ?>
    
    <?php if (isset($this->_table->foreignKeys[$column->name])) 
    {
        $fkTable=$this->_table->foreignKeys[$column->name][0];
        $fkClass=$this->generateClassName($fkTable);
     echo "<?php   echo \$form->dropDownListControlGroup(\$model,'$column->name',$fkClass::model()->listAll());  ?>";
     
    }
    
 elseif (!$column->autoIncrement){
	
	echo "	 <?php echo \$form->textFieldControlGroup(\$model,'$column->name',array('span'=>5,'maxlength'=>$column->size)); ?>\n";
		 
 }
?>

<?php endforeach;?>
    <div class="form-actions">
        <?php echo "<?php echo TbHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>\n"; ?>
    </div>

    <?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->