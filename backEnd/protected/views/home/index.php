 <?php echo Yii::t('strings','home.welcome')?>: 
 <?php echo Yii::app()->user->name ?><br>
 <?php echo Yii::t('strings','home.name')?>: 
 <?php echo $userData->name; ?><br>
 <?php echo Yii::t('strings','home.email')?>: 
 <?php echo $userData->email; ?><br>
 <?php echo Yii::t('strings','home.roles')?>: 
 <?php 
// $this->pr($userData->roles);
 foreach ($userData->roles as $value) {
    echo $value->name .' ';
}
 ?><br>
 

