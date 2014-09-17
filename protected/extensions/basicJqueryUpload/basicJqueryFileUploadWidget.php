<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class basicJqueryFileUploadWidget extends CWidget {
	/**
     * Publishes the required assets
     */
	public $model;
	public $attribute;
    public function init() {
        parent::init();
        $this -> publishAssets();
    }
	/**
     * Generates the required HTML and Javascript
     */
    public function run() {
		$this->render('basic',array('model'=>$this->model,'attribute'=>$this->attribute));
	}
	/**
     * Publises and registers the required CSS and Javascript
     * @throws CHttpException if the assets folder was not found
     */
    public function publishAssets() {
        $assets = dirname(__FILE__) . '/assets';
        $baseUrl = Yii::app() -> assetManager -> publish($assets);
        if (is_dir($assets)) {
			
            //@ALEXTODO make ui interface optional
            Yii::app() -> clientScript -> registerCssFile($baseUrl . '/css/jquery.fileupload.css');
            // The basic File Upload plugin
            Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.fileupload.js', CClientScript::POS_END);
            Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.fileupload-process.js', CClientScript::POS_END);
          
			// if($this->previewImages || $this->imageProcessing){
                Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/load-image.all.min.js', CClientScript::POS_END);
                Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/canvas-to-blob.min.js', CClientScript::POS_END);
          //  }
            //The Iframe Transport is required for browsers without support for XHR file uploads
            Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.iframe-transport.js', CClientScript::POS_END);
            // The File Upload image processing plugin
           // if($this->imageProcessing){
                Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.fileupload-image.js', CClientScript::POS_END);
             Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.fileupload-audio.js', CClientScript::POS_END);
    Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.fileupload-video.js', CClientScript::POS_END);
   Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.fileupload-validate.js', CClientScript::POS_END);
    Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/vendor/jquery.ui.widget.js');
           
   
				
		//	}
       
            /**
            <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
            <!--[if gte IE 8]><script src="<?php echo Yii::app()->baseUrl; ?>/js/cors/jquery.xdr-transport.js"></script><![endif]-->
             *
             */
        } else {
            throw new CHttpException(500, __CLASS__ . ' - Error: Couldn\'t find assets to publish.');
        }
    }

}