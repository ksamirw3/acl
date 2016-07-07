<?php
/* @var $this NewsLangController */
/* @var $model NewsLang */

$this->breadcrumbs=array(
	'News Langs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NewsLang', 'url'=>array('index')),
	array('label'=>'Manage NewsLang', 'url'=>array('admin')),
);
?>

<h1>Create NewsLang</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>