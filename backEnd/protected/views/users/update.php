<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	Yii::t('strings','Users')=>array('admin'),
	Yii::t('strings','Update'),
);
?>

<h1><?php echo Yii::t('strings', 'Update Users')?> <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>