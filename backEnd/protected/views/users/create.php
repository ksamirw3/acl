<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	Yii::t('strings','Users')=>array('admin'),
	Yii::t('strings','Create'),
);
?>

<h1><?php echo Yii::t('strings', 'Create Users')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>