<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	Yii::t('strings','News')=>array('admin'),
	Yii::t('strings','Create'),
);
?>

<h1><?php echo Yii::t('strings', 'Create News')?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>