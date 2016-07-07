<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	Yii::t('strings','News')=>array('admin'),
	Yii::t('strings','Update'),
);
?>

<h1><?php echo Yii::t('strings', 'Update News')?> <?php echo $model->id; ?></h1>
<?php echo Yii::t('strings', 'backEndTitle')?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>