<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>FALSE,
)); ?>

        <p class="note"><?php echo Yii::t('strings', 'Fields with')?> <span class="required">*</span> 
            <?php echo Yii::t('strings', 'required')?></p>

	<?php echo $form->errorSummary($model,Yii::t('strings', 'errorsNote')); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        
        <div class='control-group'>
                <?php echo $form->labelEx($model, 'repeat_password'); ?>
                <div class='controls'>
                        <?php echo $form->passwordField($model, 'repeat_password',array('size'=>45,'maxlength'=>45)); ?>
                        <?php echo $form->error($model, 'repeat_password'); ?>
                </div>
        </div>

<!--	<div class="row">-->
		<?php // echo $form->labelEx($model,'active'); ?>
		<?php echo $form->hiddenField($model, 'active', array('value'=>'1')); 
                    //echo $form->checkBox($model,'active'); ?>
		<?php // echo $form->error($model,'active'); ?>
	<!--</div>-->
   
        
      <div class="row">
        <?php echo $form->labelEx($model,'roleIDs'); ?>
    <?php 
//$roles = UserRole::model()->findAll();
//$list = CHtml::listData($roles, 'code', 'name');
//echo $form->listBox($model,'roleIDs', $list,array('size'=>5, 'multiple' => 'multiple'));


echo $form->dropDownList($model,'roleIDs', 
  CHtml::listData(UserRole::model()->findAll(), 'code', 'name'),
     array('multiple'=>true,'style'=>'width:200px;','size'=>'5'));

echo $form->error($model,'roleIDs');
    ?>
    </div>  
        

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('strings', 'Create') : Yii::t('strings', 'Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->