<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form TbActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

    <?php// $this->widget('bootstrap.widgets.TbAlert', array(
        //'alerts'=>array('contact'),
  //  )); ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, Yii::app()->user->getFlash('contact')); ?>

<?php else: ?>
<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'name'); ?>

    <?php echo $form->textFieldControlGroup($model,'email'); ?>

    <?php echo $form->textFieldControlGroup($model,'subject',array('size'=>60,'maxlength'=>128)); ?>

    <?php echo $form->textAreaControlGroup($model,'body',array('rows'=>6, 'class'=>'span8')); ?>

	<?php if(CCaptcha::checkRequirements()): ?>
		<?php echo $form->textFieldControlGroup($model,'verifyCode',array( //src: http://www.yiiframework.com/forum/index.php/topic/46225-yiistrap-captcha/
            'help'=>'Please enter the letters as they are shown in the image above.<br/>Letters are not case-sensitive.',
                    'controlOptions' => array('before' => $this->widget('system.web.widgets.captcha.CCaptcha', array(), true) . '<br/>')
        )); ?>
	<?php endif; ?> 

	<div class="form-actions">
		<?php
                echo TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY));
                 ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>