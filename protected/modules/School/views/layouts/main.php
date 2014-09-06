<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/custom.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.css" />
		<?php Yii::app()->bootstrap->register(); ?>
			<!--   <script type="text/javascript" src="https://www.google.com/jsapi" ></script>
			   <script src='<?php echo Yii::app()->baseUrl . '/js/googleTransliteration.js'; ?>' type='text/javascript' ></script>
			   <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet" />
		-->
		<?php Yii::app()->language = 'hi'; ?>

    </head>

    <body>
		<style type="text/css">
			.user1
			{
				visibility:hidden;
				display:none;
			}
			.open > .user1 {
				display: block;
					visibility:visible;
			}
			
		</style>

		<?php if (isset($this->breadcrumbs)): ?>
			<?php
			$this->widget('bootstrap.widgets.TbBreadcrumb', array(
				'links' => $this->breadcrumbs,
			));
			?><!-- breadcrumbs -->
		<?php endif ?>

		<div class="container">
            <div class="content">

				<div class="row-fluid">
					<div class="span3">
						<?php
						$this->widget('application.extensions.YiiSmartMenu', array(
							//No required init options
							'partItemSeparator' => '.',
							'upperCaseFirstLetter' => true,
							'activeCssClass' => 'active',
							'activateParents' => true,
							'encodeLabel' => false,
							'htmlOptions' => array(
								'class' => 'nav nav-tabs nav-stacked',
							),
							'submenuHtmlOptions' => array(
								'class' => 'nav nav-tabs nav-stacked user1',
							),
							'itemCssClass' => '',
							//Same options used in CMenu
							'items' => array(
								array(
									'label' => 'School'.'<i class="icon-chevron-right pull-right"></i>',
									'url' => array('#',
									),
									'linkOptions' => array(
										'class' => 'dropdown-toggle',
										'data-toggle' => 'dropdown',
										'role' => 'menu',
									),
									'htmlOptions' => array('class' => 'nav nav-list'),
									'itemOptions' => array('class' => 'dropdown'),
									'items' => array(
										array('label' => 'Add new School',
											'url' => array('/School/school/create')
										),
										array('label' => 'Add Enrollment data for School',
											'url' => array('/School/school/create')
										),
									),
								),
								array(
									'label' => 'Student'.'<i class="icon-chevron-right pull-right"></i>',
									'url' => array('#',
									),
									'linkOptions' => array(
										'class' => 'dropdown-toggle',
										'data-toggle' => 'dropdown',
										'role' => 'menu',
									),
									'htmlOptions' => array('class' => 'nav nav-list'),
									'itemOptions' => array('class' => 'dropdown'),
									'items' => array(
										array('label' => 'Add/Import Students',
											'url' => array('/School/student/create')
										),
										array('label' => 'View Student List',
											'url' => array('/School/student/manage')
										),
									),
								),
																array(
									'label' => 'Learning Levels'.'<i class="icon-chevron-right pull-right"></i>',
									'url' => array('#',
									),
									'linkOptions' => array(
										'class' => 'dropdown-toggle',
										'data-toggle' => 'dropdown',
										'role' => 'menu',
									),
									'htmlOptions' => array('class' => 'nav nav-list'),
									'itemOptions' => array('class' => 'dropdown'),
									'items' => array(
										array('label' => 'Add Learning Level of Students',
											'url' => array('/School/LearningLevel/learninglevel/create')
										),
										array('label' => 'View Learning Level of Student',
											'url' => array('/School/learningLevel/learninglevel/manage')
										),
									),
								),
							)));
						?>

					</div>
					<div class="span8">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>



	</body>
</html>
