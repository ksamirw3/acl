<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends UAccessController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    
    public $langs = array('en', 'ar');
    
    public $settings = array();
    

    protected function beforeAction($event) {
        $this->setLang();
        return true;
    }
    
    public function setLang() {
//        Yii::app()->language = 'en';
    $this->settings['uploadUrl'] = Yii::app()->baseUrl . '/upload/';

        if (isset($_GET['lang'])) {
            $lang = $_GET['lang']; //Yii::app()->language;
            
            
             $cookie = new CHttpCookie('lang',$lang);
            Yii::app()->request->cookies['lang'] = $cookie;

            
//            Yii::app()->setLanguage($lang);
        }
        
        if(!empty(Yii::app()->request->cookies['lang']->value)){
            Yii::app()->language = Yii::app()->request->cookies['lang']->value;
        }else{
            Yii::app()->language = 'en';
        }
        
//       echo Yii::app()->language;
    }
    
   protected function getFileName($fileObj) {
        $fileName = mt_rand(100000, 999999) . '_' . $fileObj;
        return $fileName;
    }

    protected static function pr($Obj) {
        echo "<pre>";
        print_r($Obj);
        echo '</pre>';
    } 

}
