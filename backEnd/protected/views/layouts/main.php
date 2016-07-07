<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js" type="text/javascript"></script>

	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::t('strings', Yii::app()->name)); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>Yii::t('strings', 'Home'), 'url'=>array('/home/')),
				array('label'=>Yii::t('strings', 'Users'), 'url'=>array('/users/admin'), 'visible'=>User::checkTask('usersTask')),
				array('label'=>Yii::t('strings', 'News'), 'url'=>array('/news/admin')),
				array('label'=>Yii::t('strings', 'Login'), 'url'=>array('/UserAdmin/auth/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('strings', 'menu.logout'). ' ('.Yii::app()->user->name.')', 'url'=>array('/UserAdmin/auth/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>Yii::t('strings', 'ar'), 'url'=>array('home/','lang'=>'ar')),
                            array('label'=>Yii::t('strings', 'en'), 'url'=>array('home/','lang'=>'en')),
			),
		)); ?>
            
            <?php // echo CHtml::link('Ar',array('home/','lang'=>'ar'))?>
<?php // echo "----";?>
<?php // echo CHtml::link('Eng',array('home/','lang'=>'en'))?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
