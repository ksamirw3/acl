<?php
/* @var $this NewsLangController */
/* @var $model NewsLang */

$this->breadcrumbs=array(
	'News Langs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NewsLang', 'url'=>array('index')),
	array('label'=>'Create NewsLang', 'url'=>array('create')),
	array('label'=>'View NewsLang', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NewsLang', 'url'=>array('admin')),
);
?>

<h1>Update NewsLang <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>