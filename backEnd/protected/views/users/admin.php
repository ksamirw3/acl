<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    Yii::t('strings','Users') => array('admin'),
);

//$this->menu = array(
//    array('label' => 'List Users', 'url' => array('index')),
//    array('label' => 'Create Users', 'url' => array('Create')),
//);
?>

<h1><?php echo Yii::t('strings', 'Users') ?></h1>

<?php echo CHtml::link(Yii::t('strings', 'Create'), array('users/create'), array('class' => 'btn btn-default btn-sm')); ?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'users-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
//        'id',
//        'login',
        array(  
            'header' => Yii::t('strings', 'id'),
            'name'=>'id',
            'value'=>'$data->id',
            'filter'=>false,
        ),
        array(  
            'header' => Yii::t('strings', 'login'),
            'name'=>'login',
            'value'=>'$data->login',
            'filter'=>false,
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}{update}',
            'deleteConfirmation'=>Yii::t('strings', 'userDeleteConfirm'),
        ),
    ),
));
?>
