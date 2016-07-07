<?php
/* @var $this NewsLangController */
/* @var $model NewsLang */
/* @var $form CActiveForm */
?>



<p class="note"> <?php echo Yii::t('strings', $lang) ?> <?php echo Yii::t('strings', 'Fields') ?> </p>

<?php
//echo $form->errorSummary($model);
echo $form->errorSummary($model,Yii::t('strings', 'errorsNote')); 
$modelId = 'NewsLang[' . $i . ']';
?>

<div class="row">
    <?php // echo $form->labelEx($model,'news_id'); ?>
    <?php echo $form->hiddenField($model, 'news_id', array('name' => $modelId . "[news_id]")); ?>
    <?php // echo $form->error($model,'news_id'); ?>
</div>

<div class="row">
    <?php // echo $form->labelEx($model,'language'); ?>
    <?php
    echo $form->hiddenField($model, 'language', array(
        'name' => $modelId . "[language]",
        'size' => 6, 'maxlength' => 6,
        'value' => $lang));
    ?>
    <?php // echo $form->error($model,'language');  ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'title'); ?>
    <?php
    echo $form->textField($model, 'title', array(
        'name' => $modelId . "[title]",
        'size' => 60,
        'maxlength' => 255));
    ?>
<?php echo $form->error($model, 'title'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'description'); ?>
<?php echo $form->textArea($model, 'description', array(
    'name' => $modelId . "[description]", 
    'size' => 60, 
    'rows' => 6, 
    'cols' => 50,
    'filter'=> 'html'
    )); ?>
<?php echo $form->error($model, 'description'); ?>
</div>