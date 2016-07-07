<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="note"><?php echo Yii::t('strings', 'Fields with')?> <span class="required">*</span> 
        <?php echo Yii::t('strings', 'required')?></p>

        <?php echo $form->errorSummary($model,Yii::t('strings', 'errorsNote')); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'image'); ?>
<?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 200)); ?>
    <?php echo $form->error($model, 'image'); ?>
        <?php
        if ($model->image != '') {
            echo "<img src='" . $this->settings['uploadUrl'] . $model->image . "' width='75' hieght='75'>";
            
            echo $form->labelEx($model, 'deleteImg');
            echo $form->checkBox($model,'deleteImg');
        }
        ?>
    </div>

    <?php
    $i = 0;
    $arModel = null;
    $enModel = null;
    $langArray = array();
    
    foreach ($model->newsLang as $langModel) {
        $langArray[$langModel->language] = $langModel;
        if($langModel->language == 'ar'){
            $arModel = $langModel;
        } elseif($langModel->language == 'en') {
            $enModel = $langModel;
        }
    }
        
    foreach ($this->langs as $lang) {
        
        $myModel = null;
        if (array_key_exists($lang, $langArray)){
            $myModel = $langArray[$lang];
        } else {
           $myModel = new NewsLang();
        }
//        echo "<pre>";
//        print_r($myModel);
//        echo "</pre>";
        $this->renderPartial('_form_lang', array(
            'model' => $myModel,
            'form' => $form,
            'lang' => $lang,
            'i' => $i));
        $i++;
    }
    
    ?>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->