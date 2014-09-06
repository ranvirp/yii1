 <?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>

/* @var $model <?php echo get_class($model); ?> */
/* @var $form TbActiveForm */
<?php echo "?>\n"; ?>

<div class="form">

    <?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'" . get_class($model) . "-Import form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
        'layout'=>  TbHtml::FORM_LAYOUT_HORIZONTAL,
        'action'=>Yii::app()->createUrl('/importModels/import/do/m/".get_class($model)."')); ?>\n"; 
	?>
<?php $x=array();$y=array();$i=1;?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>
   
<?php foreach ($model->tableSchema->columns as $column): ?>
    
    <?php if (isset($model->tableSchema->foreignKeys[$column->name])) 
    {
        $fkTable=$model->tableSchema->foreignKeys[$column->name][0];
        $fkClass=$this->generateClassName($fkTable);
     echo "<?php   echo \$form->dropDownListControlGroup(\$model,'$column->name',$fkClass::model()->listAll());  ?>";
     
    }
    
 elseif (!$column->autoIncrement){
    
    $y[]= "     <?php echo '<tr><td>$column->name</td><td>$column->type<td>'.TbHtml::dropDownList('$column->name'.'_xlsx',$i,range(-1,30)); ?>\n";
    $i++;     
 }
?>

<?php endforeach;?>
    <div class="row-fluid">
        <div class="span6">
    <?php 
        echo "<table class='table'><tr><th>Column of Model</th><th>Type</th><th>Col. No. in XLSX</th></tr>";
        foreach ($y as $y1) echo $y1."\n"; 
    ?>
        </table>
        </div> 
    <div class="span6">
    <?php echo "\n";?>
    <label for="row_initial">Initial Row No:</label><?php  echo TbHtml::textField('row_initial');?>
    <?php echo "\n";?>
    <label for="row_final">  Final Row No:</label><?php echo TbHtml::textField('row_final');?>
    <?php echo "\n";?>
    <label for="new_file"> New file:</label> <?php echo TbHtml::fileField('new_file');?>
    <?php echo "\n";?>
    <label for="existing_file">Existing file:</label><?php echo TbHtml::dropDownList('existing_file', '', Importinfo::model()->listAll());?>
    <?php echo "\n";?>
    </div>
    </div>
    <div class="form-actions">
        <?php echo "<?php echo TbHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save',array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
            'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>\n"; ?>
    </div>

    <?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form --> 