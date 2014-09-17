<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	/**
	 * Displays the test page
	 */
	public function actionTest1()
	{
		
		$this->render('test1');
	}
	public function actionUpload()
	{
		header( 'Vary: Accept' );
        if( isset( $_SERVER['HTTP_ACCEPT'] ) && (strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) !== false) ) {
            header( 'Content-type: application/json' );
        } else {
            header( 'Content-type: text/plain' );
        }
 
        if( isset( $_GET["_method"] ) ) {
            if( $_GET["_method"] == "delete" ) {
                $success = is_file( $_GET["file"] ) && $_GET["file"][0] !== '.' && unlink( $_GET["file"] );
                echo json_encode( $success );
            }
        } else {
            $this->init( );
            $model = new Uploads;//Here we instantiate our model
 
            //We get the uploaded instance
            $model->file = CUploadedFile::getInstanceByName( 'Issues[attachments]' );
            if( $model->file !== null ) {
                $model->mime_type = $model->file->getType( );
                $model->size = $model->file->getSize( );
                $model->name = $model->file->getName( );
                //Initialize the ddditional Fields, note that we retrieve the
                //fields as if they were in a normal $_POST array
                $model->title = Yii::app()->request->getPost('title', '');
                $model->description  = Yii::app()->request->getPost('description', '');
 $model->code='::';
                if( $model->validate( ) ) {
                    $path = Yii::app() -> getBasePath() . "/data/files";
                    $publicPath = Yii::app()->getBaseUrl()."/files/uploads";
                    if( !is_dir( $path ) ) {
                        mkdir( $path, 0777, true );
                        chmod ( $path , 0777 );
                    }
                    $model->file->saveAs( $path.$model->name );
                    chmod( $path.$model->name, 0777 );
 
                    //Now we return our json
                    echo json_encode( array( array(
                            "name" => $model->name,
                            "type" => $model->mime_type,
                            "size" => $model->size,
                            //Add the title 
                            "title" => $model->title,
                            //And the description
                            "description" => $model->description,
                            "url" => $publicPath.$model->name,
                            "thumbnail_url" => $publicPath.$model->name,
                            "delete_url" => $this->createUrl( "upload", array(
                                "_method" => "delete",
                                "file" => $path.$model->name
                            ) ),
                            "delete_type" => "POST"
                        ) ) );
                } else {
                    echo json_encode( array( array( "error" => $model->getErrors( 'file' ), ) ) );
                    Yii::log( "XUploadAction: ".CVarDumper::dumpAsString( $model->getErrors( ) ), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction" );
                }
            } else {
                throw new CHttpException( 500, "Could not upload file" );
            }
        }
    }
	
}