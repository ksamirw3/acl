<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs = array(
    Yii::t('strings','News') => array('admin'),
);

//$this->menu=array(
//	array('label'=>'List News', 'url'=>array('admin')),
//	array('label'=>'Create News', 'url'=>array('create')),
//);
?>

<h1><?php echo Yii::t('strings', 'News') ?></h1>
<?php echo CHtml::link(Yii::t('strings', 'Create'), array('news/create'), array('class' => 'btn btn-default btn-sm')); ?>
<!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'news-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
//        'id',
//        'image',
        array(
            'header' => Yii::t('strings', 'title'),
            'name' => 'news.newsLang.title',
            'value' => '$data->newsLang[0]->title',
        ),
        array(
            'header' => Yii::t('strings', 'description'),
            'name' => 'news.newsLang.description',
            'value' => '$data->newsLang[0]->description',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}{update}',
            'deleteConfirmation'=>Yii::t('strings', 'newsDeleteConfirm'),
        ),
    ),
));
?>
