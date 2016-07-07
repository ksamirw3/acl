<?php
/* @var $this NewsLangController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'News Langs',
);

$this->menu=array(
	array('label'=>'Create NewsLang', 'url'=>array('create')),
	array('label'=>'Manage NewsLang', 'url'=>array('admin')),
);
?>

<h1>News Langs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
