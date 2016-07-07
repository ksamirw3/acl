<?php
/* @var $this NewsLangController */
/* @var $model NewsLang */

$this->breadcrumbs=array(
	'News Langs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List NewsLang', 'url'=>array('index')),
	array('label'=>'Create NewsLang', 'url'=>array('create')),
	array('label'=>'Update NewsLang', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NewsLang', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NewsLang', 'url'=>array('admin')),
);
?>

<h1>View NewsLang #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'news_id',
		'language',
		'title',
		'description',
	),
)); ?>
