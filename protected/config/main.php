<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    /*
    'controllerMap' => array(
'api' => array(
'class' => 'ext.json_api.JsonApiController',
'modelName' => 'Post',
),
),
    */
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'runtimePath'=>"/home/ranvir/runtime",
	'name'=>'My Web Application',
	'language'=>'en',
	// preloading 'log' component
	'theme'=>'abound',
	'preload'=>array('log'),
    'defaultController'=>'Basedata/revenueVillage',
    'aliases'=>array(
	     // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/yiistrap-bs3'), // change if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels-bs3'),
		 //If you manually installed it
    'xupload' => realpath(__DIR__ . '/../extensions/xupload-0.5.1'),
		'basicupload' => realpath(__DIR__ . '/../extensions/basicJqueryUpload'),
        'RestfullYii'=>realpath(__DIR__.'/../extensions/RestfullYii'),
	
		
	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.controllers.UtilityController',
		'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
         'application.modules.Basedata.models.*',  
		 'application.modules.Basedata.components.*',  
		
		'application.modules.School.models.*',  
		'application.modules.rdp.models.*',  
	    
	    
	    'bootstrap.helpers.*',
		'bootstrap.widgets.*',
		'bootstrap.behaviors.*',
		'ext.giix-components.*', // giix components
            'ext.AweCrud.components.*', 
		'ext.AttachmentBehavior.AttachmentBehavior.*',
	),

	'modules'=>array(
            'importModels',
		    'Basedata',
		    'rdp',
		    'School'=>array(
			  'modules'=>array('LearningLevel'),	
			),
	    'user'=>array(
                'tableUsers' => 'users',
                'tableProfiles' => 'profiles',
                'tableProfileFields' => 'profiles_fields',
                     # encrypting method (php hash function)
                'hash' => 'md5',
 
                # send activation email
                'sendActivationMail' => true,
 
                # allow access for non-activated users
                'loginNotActiv' => false,
 
                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,
 
                # automatically login from registration
                'autoLogin' => true,
 
                # registration path
                'registrationUrl' => array('/user/registration'),
 
                # recovery password path
                'recoveryUrl' => array('/user/recovery'),
 
                # login form path
                'loginUrl' => array('/user/login'),
 
                # page after login
                'returnUrl' => array('/user/profile'),
 
                # page after logout
                'returnLogoutUrl' => array('/user/login'),
      
 ),
        //Modules Rights
   'rights'=>array(
 
                'superuserName'=>'Admin', // Name of the role with super user privileges. 
               'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 
               'userIdColumn'=>'id', // Name of the user id column in the database. 
               'userNameColumn'=>'username',  // Name of the user name column in the database. 
               'enableBizRule'=>true,  // Whether to enable authorization item business rules. 
               'enableBizRuleData'=>true,   // Whether to enable data for business rules. 
               'displayDescription'=>true,  // Whether to use item description instead of name. 
               'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
               'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
 
               'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested. 
               'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights. 
               'appLayout'=>'application.views.layouts.main', // Application layout. 
               'cssFile'=>'rights.css', // Style sheet file to use for Rights. 
               'install'=>false,  // Whether to enable installer. 
               'debug'=>false, 
        ),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'ext.giiNew.GiiModule',
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
			
			 'ext.bootstrap.gii'
			),
		),
		
	),

	// application components
	'components'=>array(
            	'messages' => array (
		'extensionPaths' => array(
			'AweCrud' => 'ext.AweCrud.messages', // AweCrud messages directory.
		),
	),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		       'user'=>array(
                'class'=>'RWebUser',
                // enable cookie-based authentication
                'allowAutoLogin'=>true,
                'loginUrl'=>array('/user/login'),
        ),
		
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
            'rightsTable'=>'rights',
        ),
 
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                     //'showScriptName' => false,
                        'rules'=>require(dirname(__FILE__).'/../extensions/RestfullYii/config/routes.php'),
                    /*
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
                     * */
                     
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=mydb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
			'tablePrefix'=>'',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		 // yiistrap configuration
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',   
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
                // this is used in contact page
                'adminEmail'=>'webmaster@example.com',
                'filesAlias'=>'application.data.files',
        ),
);